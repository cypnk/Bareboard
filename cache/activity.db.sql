
-- Logging for activity
-- This table should be write-only
CREATE TABLE activity( 
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	
	-- Visit, search, post, etc...
	label TEXT NOT NULL COLLATE NOCASE,
	
	-- IP address, username, etc..
	content TEXT NOT NULL COLLATE NOCASE,
	
	created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	expires DATETIME DEFAULT NULL
);
CREATE INDEX idx_activity_label ON activity ( label );-- --
CREATE INDEX idx_activity_content ON activity ( content );-- --
CREATE INDEX idx_activity_created ON activity ( created );-- --
CREATE INDEX idx_activity_expires ON activity ( expires DESC )
	WHERE expires IS NOT NULL;-- --

-- Set activity to expire in 7 days if not set
CREATE TRIGGER activity_after_insert AFTER INSERT ON activity FOR EACH ROW 
WHEN NEW.expires IS NULL
BEGIN
	UPDATE activity SET 
		expires = datetime( 
			( strftime( '%s','now' ) + 604800 ), 
			'unixepoch' 
		) WHERE rowid = NEW.rowid;
	
	DELETE FROM activity WHERE expires IS NOT NULL 
		AND (
			strftime( '%s', expires ) < 
			strftime( '%s', 'now' ) 
		);
END;
