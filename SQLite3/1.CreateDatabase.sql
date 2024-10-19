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

CREATE TABLE sessionType (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL
);

CREATE TABLE run (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	game INTEGER NOT NULL,
	name TEXT NOT NULL,

	FOREIGN KEY (game) REFERENCES game(id)
);

CREATE TABLE session (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	startedAt TEXT NOT NULL,
	stoppedAt TEXT NOT NULL,
	game INTEGER NOT NULL,
	sessionType INTEGER NULL,
	run INTEGER NULL,
	note TEXT NULL,
	
	FOREIGN KEY (game) REFERENCES game(id),
	FOREIGN KEY (sessionType) REFERENCES sessionType(id),
	FOREIGN KEY (run) REFERENCES run(id)
);


CREATE VIEW v_sessions AS
SELECT 
	session.startedAt,
	session.stoppedAt,
	platform.manufacturer || ' / ' || platform.name [platform],
	collection.name [collection],
	game.name [game],
	sessionType.name [sessionType],
	run.name [run],
	session.note,
	STRFTIME('%H:%M:%S', STRFTIME('%s', session.stoppedAt) - STRFTIME('%s', session.startedAt), 'unixepoch') [duration]
FROM
	session
	INNER JOIN game ON session.game = game.id
	INNER JOIN platform ON game.platform = platform.id
	LEFT OUTER JOIN collection ON game.collection = collection.id
	LEFT OUTER JOIN sessionType ON session.sessionType = sessionType.id
	LEFT OUTER JOIN run ON session.run = run.id;

CREATE VIEW v_optionsGames AS
SELECT
	game.id,
	game.name || ' [' || platform.manufacturer || ' / ' || platform.name || ']' [game],
	COALESCE([latest].def, 0) [default]
FROM 
	game
	INNER JOIN platform ON game.platform = platform.id
	LEFT JOIN (SELECT game, 1 [def] FROM session ORDER BY startedAt DESC LIMIT 1) [latest] ON game.id = [latest].game;