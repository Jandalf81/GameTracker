DROP VIEW v_sessions;

CREATE VIEW v_sessions AS
SELECT 
	session.id [sessionID],
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



DROP VIEW v_optionsGames;

CREATE VIEW v_optionsGames AS
SELECT
	game.id,
	game.name || ' [' || platform.manufacturer || ' / ' || platform.name || ']' [game],
	COALESCE([latest].def, 0) [default]
FROM 
	game
	INNER JOIN platform ON game.platform = platform.id
	LEFT JOIN (SELECT game, 1 [def] FROM session ORDER BY startedAt DESC LIMIT 1) [latest] ON game.id = [latest].game;