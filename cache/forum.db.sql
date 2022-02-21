
-- Work in progress
-- This may change drastically

-- Generate a random unique string
-- Usage:
-- SELECT id FROM rnd;
CREATE VIEW rnd AS 
SELECT lower( hex( randomblob( 16 ) ) ) AS id;-- --

-- User profiles
CREATE TABLE users (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	username TEXT NOT NULL COLLATE NOCASE,
	password TEXT NOT NULL,
	
	-- Normalized, lowercase, and stripped of spaces
	user_clean TEXT NOT NULL COLLATE NOCASE,
	display TEXT DEFAULT NULL COLLATE NOCASE,
	bio TEXT DEFAULT NULL COLLATE NOCASE,
	email TEXT DEFAULT NULL COLLATE NOCASE,
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	
	-- Serialized JSON
	settings TEXT NOT NULL DEFAULT '{}' COLLATE NOCASE,
	status INTEGER NOT NULL DEFAULT 0
);-- --
CREATE UNIQUE INDEX idx_user_name ON users( username );-- --
CREATE UNIQUE INDEX idx_user_clean ON users( user_clean );-- --
CREATE INDEX idx_user_created ON users ( created );-- --
CREATE INDEX idx_user_updated ON users ( updated );-- --
CREATE INDEX idx_user_status ON users ( status );-- --

-- User searching
CREATE VIRTUAL TABLE user_search 
	USING fts4( username, tokenize=unicode61 );-- --


-- Cookie based login tokens
CREATE TABLE logins(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	user_id INTEGER NOT NULL,
	lookup TEXT NOT NULL COLLATE NOCASE,
	updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	hash TEXT DEFAULT NULL,
	
	CONSTRAINT fk_logins_user 
		FOREIGN KEY ( user_id ) 
		REFERENCES users ( id )
		ON DELETE CASCADE
);-- --
CREATE UNIQUE INDEX idx_login_user ON logins( user_id );-- --
CREATE UNIQUE INDEX idx_login_lookup ON logins( lookup );-- --
CREATE INDEX idx_login_updated ON logins( updated );-- --
CREATE INDEX idx_login_hash ON logins( hash )
	WHERE hash IS NOT NULL;-- --

-- Login view
-- Usage:
-- SELECT * FROM login_view WHERE lookup = :lookup;
CREATE VIEW login_view AS 
SELECT 
	logins.user_id AS id, 
	logins.lookup AS lookup, 
	logins.hash AS hash, 
	logins.updated AS updated, 
	users.status AS status, 
	users.username AS name,
	users.password AS password,
	users.settings AS user_settings,
	ua.is_approved AS is_approved, 
	ua.is_locked AS is_locked
	
	FROM logins
	JOIN users ON logins.user_id = users.id
	LEFT JOIN user_auth ua ON users.id = ua.user_id;-- --


-- Login regenerate. Not intended for SELECT
-- Usage:
-- UPDATE logout_view SET lookup = '' WHERE user_id = :user_id;
CREATE VIEW logout_view AS 
SELECT user_id, lookup FROM logins;-- --

-- Reset the lookup string to force logout a user
CREATE TRIGGER user_logout INSTEAD OF UPDATE OF lookup ON logout_view
BEGIN
	UPDATE logins SET lookup = ( SELECT id FROM rnd ), 
		updated = CURRENT_TIMESTAMP
		WHERE user_id = NEW.user_id;
END;-- --

-- New user, insert user search and create login lookups
CREATE TRIGGER user_insert AFTER INSERT ON users FOR EACH ROW 
BEGIN
	-- Create search data
	INSERT INTO user_search( docid, username ) 
		VALUES ( NEW.id, NEW.username );
	
	-- New login lookup
	INSERT INTO logins( user_id, lookup )
		VALUES( NEW.id, ( SELECT id FROM rnd ) );
END;-- --

-- Update last modified
CREATE TRIGGER user_update AFTER UPDATE ON users FOR EACH ROW
BEGIN
	UPDATE users SET updated = CURRENT_TIMESTAMP 
		WHERE id = OLD.id;
	
	UPDATE user_search 
		SET username = NEW.username || ' ' || NEW.display
		WHERE docid = OLD.id;
END;-- --


-- Delete user search data following user delete
CREATE TRIGGER user_delete BEFORE DELETE ON users FOR EACH ROW 
BEGIN
	DELETE FROM user_search WHERE rowid = OLD.rowid;
END;-- --

-- User authentication and activity metadata
CREATE TABLE user_auth( 
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	user_id INTEGER NOT NULL,
	last_ip TEXT DEFAULT NULL COLLATE NOCASE,
	last_ua TEXT DEFAULT NULL COLLATE NOCASE,
	last_active DATETIME DEFAULT NULL,
	last_login DATETIME DEFAULT NULL,
	last_pass_change DATETIME DEFAULT NULL,
	last_lockout DATETIME DEFAULT NULL,
	
	-- Auth status,
	is_approved INTEGER NOT NULL DEFAULT 0,
	is_locked INTEGER NOT NULL DEFAULT 0,
	
	-- Authentication tries
	failed_attempts INTEGER NOT NULL DEFAULT 0,
	failed_last_start DATETIME DEFAULT NULL,
	failed_last_attempt DATETIME DEFAULT NULL,
	
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	
	CONSTRAINT fk_auth_user 
		FOREIGN KEY ( user_id ) 
		REFERENCES users ( id )
		ON DELETE CASCADE
);
CREATE UNIQUE INDEX idx_user_auth_id ON user_auth( user_id );-- --
CREATE INDEX idx_user_ip ON user_auth( last_ip )
	WHERE last_ip IS NOT NULL;-- --
CREATE INDEX idx_user_ua ON user_auth( last_ua )
	WHERE last_ua IS NOT NULL;-- --
CREATE INDEX idx_user_active ON user_auth( last_active )
	WHERE last_active IS NOT NULL;-- --
CREATE INDEX idx_user_login ON user_auth( last_login )
	WHERE last_login IS NOT NULL;-- --
CREATE INDEX idx_user_auth_approved ON user_auth( is_approved );-- --
CREATE INDEX idx_user_auth_locked ON user_auth( is_locked );-- --
CREATE INDEX idx_user_failed_last ON user_auth( failed_last_attempt )
	WHERE failed_last_attempt IS NOT NULL;-- -
CREATE INDEX idx_user_auth_created ON user_auth( created );-- --


-- User auth last activity
CREATE VIEW auth_activity AS 
SELECT user_id, 
	is_approved,
	is_locked,
	last_ip,
	last_ua,
	last_active,
	last_login,
	last_lockout,
	last_pass_change,
	failed_attempts,
	failed_last_start,
	failed_last_attempt
	
	FROM user_auth;-- --


-- Auth activity helpers
CREATE TRIGGER user_last_login INSTEAD OF 
	UPDATE OF last_login ON auth_activity
BEGIN 
	UPDATE user_auth SET 
		last_ip			= NEW.last_ip,
		last_ua			= NEW.last_ua,
		last_login		= CURRENT_TIMESTAMP, 
		last_active		= CURRENT_TIMESTAMP,
		failed_attempts		= 0
		WHERE id = OLD.id;
END;-- --

CREATE TRIGGER user_last_ip INSTEAD OF 
	UPDATE OF last_ip ON auth_activity
BEGIN 
	UPDATE user_auth SET 
		last_ip			= NEW.last_ip, 
		last_ua			= NEW.last_ua,
		last_active		= CURRENT_TIMESTAMP 
		WHERE id = OLD.id;
END;-- --

CREATE TRIGGER user_last_active INSTEAD OF 
	UPDATE OF last_active ON auth_activity
BEGIN 
	UPDATE user_auth SET last_active = CURRENT_TIMESTAMP
		WHERE id = OLD.id;
END;-- --

CREATE TRIGGER user_last_lockout INSTEAD OF 
	UPDATE OF is_locked ON auth_activity 
	WHEN NEW.is_locked = 1
BEGIN 
	UPDATE user_auth SET 
		is_locked	= 1,
		last_lockout	= CURRENT_TIMESTAMP 
		WHERE id = OLD.id;
END;-- --

CREATE TRIGGER user_failed_last_attempt INSTEAD OF 
	UPDATE OF failed_last_attempt ON auth_activity
BEGIN 
	UPDATE user_auth SET 
		last_ip			= NEW.last_ip, 
		last_ua			= NEW.last_ua,
		last_active		= CURRENT_TIMESTAMP,
		failed_last_attempt	= CURRENT_TIMESTAMP, 
		failed_attempts		= ( failed_attempts + 1 ) 
		WHERE id = OLD.id;
	
	-- Update current start window if it's been 24 hours since 
	-- last window
	UPDATE user_auth SET failed_last_start = CURRENT_TIMESTAMP 
		WHERE id = OLD.id AND ( 
		failed_last_start IS NULL OR ( 
		strftime( '%s', 'now' ) - 
		strftime( '%s', 'failed_last_start' ) ) > 86400 );
END;-- --


-- Main forums
CREATE TABLE forums(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	parent_id INTEGER DEFAULT NULL,
	
	title TEXT NOT NULL COLLATE NOCASE,
	description TEXT NOT NULL COLLATE NOCASE,
	
	topic_count INTEGER NOT NULL DEFAULT 0,
	last_topic_id INTEGER DEFAULT NULL,
	
	reply_count INTEGER NOT NULL DEFAULT 0,
	last_reply_id INTEGER DEFAULT NULL,
	
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	sort_order INTEGER NOT NULL DEFAULT 0,
	settings TEXT NOT NULL DEFAULT '{}' COLLATE NOCASE,
	status INTEGER NOT NULL DEFAULT 0,
	
	CONSTRAINT fk_forum_parent 
		FOREIGN KEY ( parent_id ) 
		REFERENCES forums ( id ) 
		ON DELETE CASCADE
);-- --
CREATE INDEX idx_forum_created ON forums ( created );-- --
CREATE INDEX idx_forum_last_topic_id ON forums ( last_topic_id )
	WHERE last_topic_id IS NOT NULL;-- --
CREATE INDEX idx_forum_last_reply_id ON forums ( last_reply_id )
	WHERE last_reply_id IS NOT NULL;-- --

-- Topics and replies
CREATE TABLE posts(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	forum_id INTEGER DEFAULT NULL,
	parent_id INTEGER DEFAULT NULL,
	title TEXT DEFAULT NULL COLLATE NOCASE,
	user_id INTEGER DEFAULT NULL,
	body TEXT NOT NULL COLLATE NOCASE,
	bare TEXT NOT NULL COLLATE NOCASE,
	
	-- Current author's IP
	author_ip TEXT DEFAULT NULL COLLATE NOCASE,
	
	-- Anonymous author info
	author_name TEXT DEFAULT NULL COLLATE NOCASE,
	author_key TEXT DEFAULT NULL COLLATE NOCASE,
	author_email TEXT DEFAULT NULL COLLATE NOCASE,
	
	-- Metadata
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	is_pinned INTEGER NOT NULL DEFAULT 0,
	sort_order INTEGER NOT NULL DEFAULT 0,
	status INTEGER NOT NULL DEFAULT 0,
		
	CONSTRAINT fk_post_cat
		FOREIGN KEY ( forum_id ) 
		REFERENCES forums ( id ) 
		ON DELETE CASCADE,
		
	CONSTRAINT fk_post_parent
		FOREIGN KEY ( parent_id ) 
		REFERENCES posts ( id ) 
		ON DELETE CASCADE,
		
	CONSTRAINT fk_post_user 
		FOREIGN KEY ( user_id ) 
		REFERENCES users ( id ) 
		ON DELETE RESTRICT
);-- --
CREATE INDEX idx_post_forum ON posts ( forum_id );-- --
CREATE INDEX idx_post_parent ON posts ( parent_id ) 
	WHERE parent_id IS NOT NULL;-- --
CREATE INDEX idx_post_user ON posts ( user_id )
	WHERE user_id IS NOT NULL;-- --
CREATE INDEX idx_post_author_ip ON posts ( author_ip ) 
	WHERE author_ip IS NOT NULL;-- --
CREATE INDEX idx_post_author_name ON posts ( author_name ) 
	WHERE author_name IS NOT NULL;-- --
CREATE INDEX idx_post_author_key ON posts ( author_key ) 
	WHERE author_key IS NOT NULL;-- --
CREATE INDEX idx_post_author_email ON posts ( author_email ) 
	WHERE author_email IS NOT NULL;-- --
CREATE INDEX idx_post_pinned ON posts ( is_pinned );-- --
CREATE INDEX idx_post_status ON posts ( status );-- --
CREATE INDEX idx_post_sort ON posts ( sort_order );-- --


-- Post text searching
CREATE VIRTUAL TABLE post_search 
	USING fts4( body, tokenize=unicode61 );-- --

CREATE TRIGGER post_update AFTER UPDATE ON posts FOR EACH ROW 
BEGIN
	UPDATE posts SET updated = CURRENT_TIMESTAMP 
		WHERE id = NEW.id;
END;-- --

CREATE TRIGGER post_delete BEFORE DELETE ON posts FOR EACH ROW 
BEGIN
	DELETE FROM post_search WHERE docid = OLD.id;
END;-- --

CREATE TRIGGER topic_insert AFTER INSERT ON posts FOR EACH ROW 
WHEN NEW.parent_id IS NULL AND NEW.forum_id IS NOT NULL
BEGIN
	INSERT INTO post_search( docid, body ) 
		VALUES ( NEW.id, NEW.title || ' ' || NEW.bare );
	
	UPDATE forums SET last_topic_id = NEW.id, 
		topic_count = ( topic_count + 1 ) 
		WHERE id = NEW.forum_id;
END;-- --

CREATE TRIGGER topic_update AFTER UPDATE ON posts FOR EACH ROW
WHEN NEW.parent_id IS NULL AND NEW.forum_id IS NOT NULL
BEGIN
	REPLACE INTO post_search( docid, body ) 
		VALUES( NEW.id, NEW.title || ' ' || NEW.bare );
END;-- --

CREATE TRIGGER reply_insert AFTER INSERT ON posts FOR EACH ROW 
WHEN NEW.parent_id IS NOT NULL AND NEW.forum_id IS NULL
BEGIN
	INSERT INTO post_search( docid, body ) 
		VALUES ( NEW.id, NEW.bare );
	
	UPDATE forums SET last_reply_id = NEW.id, 
		reply_count = ( reply_count + 1 ) 
		WHERE id = ( 
			SELECT posts.forum_id 
			FROM posts 
			WHERE posts.id = NEW.parent_id LIMIT 1 );
END;-- --

-- Topic deletion actions
CREATE TRIGGER topic_delete BEFORE DELETE ON posts FOR EACH ROW
WHEN OLD.forum_id IS NOT NULL AND OLD.parent_id IS NULL
BEGIN
	UPDATE forums SET 
		-- Reset last topic id
		last_topic_id = 
		( SELECT posts.id FROM posts 
			WHERE posts.forum_id = OLD.forum_id 
				AND posts.id IS NOT OLD.id 
				AND posts.status >= 0 
			ORDER BY posts.id DESC 
			LIMIT 1 ), 
		
		-- Reset last reply id, excluding replies in this topic
		last_reply_id = 
		( SELECT posts.id FROM posts 
			WHERE posts.parent_id IN 
				( SELECT parent.id FROM posts parent 
					WHERE parent.forum_id = OLD.forum_id 
					AND parent.status >= 0 
					AND parent.id IS NOT OLD.id 
				ORDER BY parent.id DESC 
				LIMIT 1 ) 
			AND posts.parent_id IS NOT OLD.id 
			AND posts.status >= 0 
			ORDER BY posts.id DESC 
			LIMIT 1 ), 
		
		-- Recount topics
		topic_count = 
		( SELECT COUNT( posts.id ) FROM posts 
			WHERE posts.forum_id = OLD.forum_id 
			AND posts.id IS NOT OLD.id ), 
		
		-- Recount replies, excluding replies in this topic
		reply_count = 
		( SELECT COUNT( posts.id ) FROM posts WHERE 
			posts.parent_id IN 
			( SELECT parent.id FROM posts parent WHERE 
				parent.forum_id = id 
				AND parent.id IS NOT OLD.id ) )
		WHERE id = OLD.forum_id;
END;-- --

-- Reply deletion actions
CREATE TRIGGER reply_delete BEFORE DELETE ON posts FOR EACH ROW
WHEN OLD.parent_id IS NOT NULL AND OLD.forum_id IS NULL
BEGIN
	UPDATE forums SET 
		-- Reset last reply
		last_reply_id = 
		( SELECT posts.id FROM posts 
			WHERE posts.parent_id = OLD.parent_id 
				AND posts.id IS NOT OLD.id 
				AND posts.status >= 0 
			ORDER BY posts.id DESC 
			LIMIT 1 ), 
		
		-- Recount replies
		reply_count = 
		( SELECT COUNT( posts.id ) FROM posts WHERE 
			posts.parent_id IN 
			( SELECT parent.id FROM posts parent WHERE 
				parent.forum_id = id ) 
			AND posts.id IS NOT OLD.id )
		
		WHERE id = 
		( SELECT posts.forum_id FROM posts 
			WHERE posts.id = OLD.parent_id LIMIT 1 );
END;-- --


-- Polling and voting
CREATE TABLE polls(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	post_id INTEGER NOT NULL,
	user_id INTEGER NOT NULL,
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	expires DATETIME DEFAULT NULL,
	
	CONSTRAINT fk_poll_user
		FOREIGN KEY ( user_id ) 
		REFERENCES users ( id ) 
		ON DELETE SET NULL,
		
	CONSTRAINT fk_poll_post
		FOREIGN KEY ( post_id ) 
		REFERENCES posts ( id ) 
		ON DELETE CASCADE
);-- --
CREATE INDEX idx_poll_post ON polls ( post_id );-- --
CREATE INDEX idx_poll_user ON polls ( user_id );-- --
CREATE INDEX idx_poll_created ON polls ( created );-- --
CREATE INDEX idx_poll_expires ON polls ( expires )
	WHERE expires IS NOT NULL;-- --

-- Set poll to expire in 7 days if not set
CREATE TRIGGER poll_after_insert AFTER INSERT ON polls FOR EACH ROW 
WHEN NEW.expires IS NULL
BEGIN
	UPDATE polls SET 
		expires = datetime( 
			( strftime( '%s','now' ) + 604800 ), 
			'unixepoch' 
		) WHERE rowid = NEW.rowid;
END;-- --

CREATE TABLE poll_options(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	poll_id INTEGER NOT NULL,
	term TEXT NOT NULL COLLATE NOCASE,
	sort_order INTEGER NOT NULL DEFAULT 0,
	
	CONSTRAINT fk_option_poll
		FOREIGN KEY ( poll_id ) 
		REFERENCES polls ( id ) 
		ON DELETE CASCADE
);-- --
CREATE INDEX idx_option_poll ON poll_options ( poll_id );-- --
CREATE INDEX idx_option_sort ON poll_options ( sort_order ASC );-- --

CREATE TABLE poll_votes(
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	option_id INTEGER NOT NULL,
	poll_id INTEGER NOT NULL,
	user_id INTEGER DEFAULT NULL,
	score REAL NOT NULL DEFAULT 0, 
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	
	CONSTRAINT fk_polls
		FOREIGN KEY ( poll_id ) 
		REFERENCES polls ( id ) 
		ON DELETE CASCADE,
		
	CONSTRAINT fk_poll_options
		FOREIGN KEY ( option_id ) 
		REFERENCES poll_options ( id ) 
		ON DELETE CASCADE,
		
	CONSTRAINT fk_vote_user
		FOREIGN KEY ( user_id ) 
		REFERENCES users ( id ) 
		ON DELETE SET NULL
);-- --
CREATE INDEX idx_vote_option ON poll_votes ( option_id );-- --
CREATE INDEX idx_vote_created ON poll_votes ( created );-- --
CREATE INDEX idx_vote_poll ON poll_votes ( poll_id );-- --
CREATE INDEX idx_vote_user ON poll_votes ( user_id );-- --


CREATE VIEW forum_view AS SELECT
	cats.id AS id,
	cats.title AS title,
	cats.parent_id AS parent_id,
	cats.description AS description,
	cats.topic_count AS topic_count, 
	cats.reply_count AS reply_count,
	cats.sort_order AS sort_order,
	cats.status AS status,
	cats.settings AS forum_settings,
	
	GROUP_CONCAT( subs.id, ',' ) AS sub_ids,
	GROUP_CONCAT( subs.status, ',' ) AS sub_status,
	
	topics.title AS last_topic_title,
	topics.id AS last_topic_id,
	topics.created AS last_topic_date,
	topics.user_id AS last_topic_user_id,
	topics.author_name AS last_topic_author,
	topics.author_key AS last_topic_author_key,
	topics.author_email AS last_topic_author_email,
	topics.author_ip AS last_topic_author_ip,
	topics.is_pinned AS last_topic_is_pinned,
	topics.status AS last_topic_status,
	
	tlast.last_ip AS last_topic_user_ip,
	tlast.last_ua AS last_topic_user_ua,
	tuser.username AS last_topic_username,
	tuser.display AS last_topic_user_display,
	tuser.email AS last_topic_user_email,
	tuser.settings AS last_topic_user_settings,
	tuser.status AS last_topic_user_status,
	
	replies.id AS last_reply_id,
	replies.created AS last_reply_date,
	replies.user_id AS last_reply_user_id,
	replies.author_name AS last_reply_author,
	replies.author_key AS last_reply_author_key,
	replies.author_email AS last_reply_author_email,
	replies.author_ip AS last_reply_author_ip,
	replies.status AS last_reply_status,
	
	rlast.last_ip AS last_reply_user_ip,
	rlast.last_ua AS last_reply_user_ua,
	ruser.username AS last_reply_username,
	ruser.display AS last_reply_user_display,
	ruser.email AS last_reply_user_email,
	ruser.settings AS last_reply_user_settings,
	ruser.status AS last_reply_user_status
	
	FROM forums cats 
	LEFT JOIN forums subs ON cats.id = subs.parent_id
	LEFT JOIN posts topics ON cats.last_topic_id = topics.id
	LEFT JOIN posts replies ON cats.last_reply_id = replies.id 
	
	LEFT JOIN users tuser ON topics.user_id = tuser.id
	LEFT JOIN user_auth tlast ON topics.user_id = tlast.user_id 
	
	LEFT JOIN users ruser ON replies.user_id = ruser.id
	LEFT JOIN user_auth rlast ON replies.user_id = rlast.user_id;-- --

CREATE VIEW forum_summary_view AS SELECT
	id, title, description, sort_order, topic_count, 
	reply_count, settings, status
	
	FROM forums;-- --

CREATE VIEW thread_view AS SELECT
	posts.id AS id,
	posts.forum_id AS forum_id, 
	posts.parent_id AS parent_id,
	posts.title AS title,
	posts.body AS body,
	posts.author_key AS author_key,
	posts.author_name AS author_name,
	posts.author_email AS author_email,
	posts.is_pinned AS is_pinned,
	posts.status AS status,
	posts.sort_order AS sort_order,
	
	users.username AS username,
	users.display AS user_display, 
	users.created AS user_created,
	users.settings AS user_settings,
	users.status AS user_status,
	
	posts.author_email AS author_email,
	posts.author_ip AS author_ip,
	ua.last_ip AS user_ip,
	ua.last_ua AS user_ua
	
	FROM posts
	LEFT JOIN users ON posts.user_id = users.id 
	LEFT JOIN user_auth ua ON users.id = ua.user_id;-- --

CREATE VIEW thread_sibling_view AS SELECT DISTINCT
	posts.id AS id,
	posts.forum_id AS forum_id, 
	
	-- Previous topic
	( SELECT id FROM posts prev 
		WHERE prev.status >= 0 
			AND prev.id < posts.id 
			AND prev.forum_id = posts.forum_id 
		ORDER BY prev.id DESC LIMIT 1
	) AS prev_topic, 
	
	-- Next topic
	( SELECT id FROM posts nxt 
		WHERE nxt.status >= 0 
			AND nxt.id > posts.id 
			AND nxt.forum_id = posts.forum_id 
		ORDER BY nxt.id ASC LIMIT 1
	) AS next_topic
	
	FROM posts;-- --


CREATE VIEW post_sibling_view AS SELECT DISTINCT
	posts.id AS id,
	posts.parent_id AS parent_id,
	
	-- Previous reply
	( SELECT id FROM posts prev 
		WHERE prev.status >= 0 
			AND prev.id < posts.id 
			AND prev.forum_id IS NULL 
			AND prev.parent_id = posts.parent_id 
		ORDER BY prev.id DESC LIMIT 1
	) AS prev_topic, 
	
	-- Next reply
	( SELECT id FROM posts nxt 
		WHERE nxt.status >= 0 
			AND nxt.id > posts.id 
			AND nxt.forum_id IS NULL 
			AND nxt.parent_id = posts.parent_id 
		ORDER BY nxt.id ASC LIMIT 1
	) AS next_topic
	
	FROM posts;-- --

CREATE VIEW thread_polls_view AS SELECT
	po.id AS id,
	po.term AS term,
	po.sort_order AS sort_order,
	polls.id AS poll_id,
	polls.post_id AS post_id,
	
	users.username AS username,
	users.display AS user_display,
	users.status AS user_status,
	SUM( pv.score ) AS score
	
	FROM poll_options po
	JOIN polls ON po.poll_id = po.poll_id
	LEFT JOIN poll_votes pv ON po.id = pv.option_id
	LEFT JOIN users ON pv.user_id = users.id;-- --



-- Moderation and content filtering
-- Usage:
-- SELECT id FROM moderation WHERE label = 'ua' AND hash = :hash 
-- SELECT id FROM moderation WHERE label = 'ip' AND content = '197.%'
CREATE TABLE moderation( 
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	
	-- Content type: IP address, user agent, username, etc..
	label TEXT NOT NULL COLLATE NOCASE,
	
	-- Duplicate check
	hash TEXT NOT NULL COLLATE NOCASE,
	
	-- Raw blocked content
	content TEXT NOT NULL COLLATE NOCASE,
	
	-- Block, suspend etc...
	response TEXT NOT NULL COLLATE NOCASE,
	
	reason TEXT DEFAULT NULL COLLATE NOCASE,
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	expires DATETIME DEFAULT NULL
);-- --
CREATE UNIQUE INDEX idx_moderate_key ON moderation ( label, hash );-- --
CREATE INDEX idx_moderate_label ON moderation ( label );-- --
CREATE INDEX idx_moderate_content ON moderation ( content ASC );-- --
CREATE INDEX idx_moderate_created ON moderation ( created );-- --
CREATE INDEX idx_moderate_expires ON moderation ( expires )
	WHERE expires IS NOT NULL;-- --

CREATE VIEW moderation_view AS SELECT
	id, label, content, hash, response, reason, created, expires 
	
	FROM moderation;-- --

-- Usage:
-- SELECT * FROM moderation_user_view 
-- 	WHERE label = 'user' AND username = :user OR user_clean = :clean
CREATE VIEW moderation_user_view AS SELECT
	md.id AS id, 
	md.label AS label, 
	md.hash AS hash, 
	md.content AS content, 
	md.response AS response, 
	md.reason AS reason, 
	md.created AS created, 
	md.expires AS expires, 
	uu.username AS username,
	uc.user_clean AS user_clean
	
	FROM moderation md 
	LEFT JOIN users uu ON md.content = uu.username 
	LEFT JOIN users uc ON md.content = uc.user_clean;-- --

-- Set auto-block helper
CREATE TRIGGER moderation_expiry_set INSTEAD OF 
	UPDATE OF expires ON moderation_view
	WHEN NEW.expires IS NULL
BEGIN 
	UPDATE moderation SET 
		expires = datetime( 
			( strftime( '%s','now' ) + 604800 ), 
			'unixepoch' 
		) WHERE rowid = NEW.rowid;
END;-- --

-- Cleanup expired mod actions
CREATE TRIGGER moderation_after_insert AFTER INSERT ON moderation FOR EACH ROW 
BEGIN
	DELETE FROM moderation WHERE expires IS NOT NULL 
		AND (
			strftime( '%s', expires ) < 
			strftime( '%s', 'now' ) 
		);
END;-- --

CREATE TRIGGER moderation_after_update AFTER UPDATE ON moderation FOR EACH ROW 
BEGIN
	DELETE FROM moderation WHERE expires IS NOT NULL 
		AND (
			strftime( '%s', expires ) < 
			strftime( '%s', 'now' ) 
		);
END;
