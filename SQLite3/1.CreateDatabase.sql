CREATE TABLE collection (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL
);

CREATE TABLE platform (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	manufacturer TEXT NOT NULL,
	name TEXT NOT NULL
);

CREATE TABLE game (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	developer TEXT NULL,
	publisher TEXT NULL,
	year INTEGER NULL,
	platform INTEGER NOT NULL,
	collection INTEGER NULL,
	
	FOREIGN KEY (platform) REFERENCES platform(id),
	FOREIGN KEY (collection) REFERENCES collection(id)
);

CREATE TABLE session (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	startedAt TEXT NOT NULL,
	stoppedAt TEXT NOT NULL,
	game INTEGER NOT NULL,
	note TEXT NULL,
	
	FOREIGN KEY (game) REFERENCES game(id)
);


CREATE VIEW v_sessions AS
SELECT 
	session.startedAt,
	session.stoppedAt,
	STRFTIME('%H:%M:%S', STRFTIME('%s', session.stoppedAt) - STRFTIME('%s', session.startedAt), 'unixepoch') [duration],
	game.name [game],
	platform.name [platform],
	collection.name [collection],
	session.note
FROM
	session
	INNER JOIN game ON session.game = game.id
	INNER JOIN platform ON game.platform = platform.id
	LEFT OUTER JOIN collection ON game.collection = collection.id;

CREATE VIEW v_optionsGames AS
SELECT
	game.id,
	game.name || ' [' || platform.manufacturer || ' / ' || platform.name || ']' [game],
	COALESCE([latest].def, 0) [default]
FROM 
	game
	INNER JOIN platform ON game.platform = platform.id
	LEFT JOIN (SELECT game, 1 [def] FROM session ORDER BY startedAt DESC LIMIT 1) [latest] ON game.id = [latest].game;