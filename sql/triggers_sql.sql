/*
 Trigger for table log to insert if username is changed
 */


CREATE OR REPLACE FUNCTION username_change_log_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'UPDATE' AND OLD.name <> NEW.name THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.id,'changed the username from ' || OLD.name || ' to ' || NEW.name,1,1);

END IF;



RETURN NEW;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER username_change_log_trigger
    BEFORE UPDATE ON qser
    FOR EACH ROW
    EXECUTE FUNCTION username_change_log_trigger_function();


/*
 Trigger for table log if permissions get added or removed
 */


CREATE OR REPLACE FUNCTION user_change_permission_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.uid,'changed the permission from the user: ' || (SELECT name FROM qser WHERE id = NEW.uid) || '! Following permission was added: ' ||(SELECT name FROM berechtigung WHERE id = NEW.bid),2,1);

    END IF;

    IF TG_OP = 'DELETE' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.uid,' permission from the user: ' || (SELECT name FROM qser WHERE id = OLD.uid) || ' was taken! Following permission was taken: ' ||(SELECT name FROM berechtigung WHERE id = OLD.bid),2,1);

    END IF;



    RETURN NEW;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE TRIGGER user_change_permission_log_trigger
    BEFORE INSERT OR DELETE ON qser_hat_berechtigung
    FOR EACH ROW
EXECUTE FUNCTION user_change_permission_trigger_function();



/*
 Trigger of table apt_list to log if apt package was installed/
 */

CREATE OR REPLACE FUNCTION user_installed_updated_deleted_apt_list_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN

        INSERT INTO log(uid,description, action, level) VALUES(NEW.uid,' user: ' || (SELECT name FROM qser WHERE id = NEW.uid) || ' has deleted an apt package! Following apt package was deleted: ' ||(SELECT name FROM aptlist WHERE id = NEW.id),3,1);

    END IF;

    IF TG_OP = 'UPDATE' AND OLD.name != NEW.name THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.uid,' user: ' || (SELECT name FROM qser WHERE id = OLD.uid) || ' has updated an apt package! Following apt package was updated: ' ||(SELECT name FROM aptlist WHERE id = OLD.id),3,1);

    END IF;

    IF TG_OP = 'DELETE' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.uid,' user: ' || (SELECT name FROM qser WHERE id = OLD.uid) || ' has deleted an apt package! Following apt package was deleted: ' ||(SELECT name FROM aptlist WHERE id = OLD.id),3,1);

    END IF;



    RETURN NEW;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE TRIGGER user_installed_updated_deleted_apt_list_trigger
    BEFORE INSERT OR DELETE OR UPDATE ON aptlist
    FOR EACH ROW
EXECUTE FUNCTION user_installed_updated_deleted_apt_list_trigger_function();


/*
 Trigger for table log to insert if a servicemonitor is inserted
 */


CREATE OR REPLACE FUNCTION insert_servicemonitor_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT'  THEN

        INSERT INTO log(uid,description, action, level) VALUES(NEW.uid,' a servicemonitor was added! service: ' || NEW.servicename ,4,1);

    END IF;



    RETURN NEW;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER insert_servicemonitor_trigger
    BEFORE INSERT ON m_servicemonitor
    FOR EACH ROW
EXECUTE FUNCTION insert_servicemonitor_trigger_function();




/*
 Trigger for table log to insert if someone tries to delete a user which cannot be deleted
 */


CREATE OR REPLACE FUNCTION user_delete_prevention_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.id,' someone tried to delete the user ' || OLD.name ,4,2);

    RETURN null;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER user_delete_prevention_trigger
    BEFORE DELETE ON qser
    FOR EACH ROW
EXECUTE FUNCTION user_delete_prevention_trigger_function();


/*
 Trigger for table log to alert if someone tries to add / remove a module value which cannot be added / removed
*/

CREATE OR REPLACE FUNCTION modul_value_insert_delete_prevention_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
        INSERT INTO log(uid,description, action, level) VALUES(2,' someone tried to delete / insert a module value! ' ,4,2);

    RETURN null;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER modul_value_insert_delete_prevention_trigger
    BEFORE DELETE OR INSERT ON modul_value
    FOR EACH ROW
EXECUTE FUNCTION modul_value_insert_delete_prevention_trigger_function();

/*
 Trigger for table log to alert if someone tries to add / remove a log level which cannot be added / removed
*/

CREATE OR REPLACE FUNCTION log_level_insert_delete_prevention_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN

        INSERT INTO log(uid,description, action, level) VALUES(2,' someone tried to insert / delete a log level'  ,4,2);


    RETURN null;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER log_level_insert_delete_prevention_trigger
    BEFORE DELETE OR INSERT ON log_level
    FOR EACH ROW
EXECUTE FUNCTION log_level_insert_delete_prevention_trigger_function();


/*
 Trigger for table log to alert if a new user is added
*/

CREATE OR REPLACE FUNCTION user_add_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN

    INSERT INTO log(uid,description, action, level) VALUES(NEW.id,' A new user was created! User: ' || NEW.name ,4,1);


    RETURN null;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER user_add_trigger
    BEFORE INSERT ON qser
    FOR EACH ROW
EXECUTE FUNCTION user_add_trigger_function();
