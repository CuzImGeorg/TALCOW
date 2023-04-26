/*
 general useful sql
 */

SELECT * FROM log_action;
SELECT * FROM log;


/*
 to test triggers:
 */
UPDATE qser SET name = 'admin' WHERE  id = 1;