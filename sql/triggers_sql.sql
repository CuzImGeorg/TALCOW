/*
 Trigger for table log to insert if username is changed
 */


CREATE OR REPLACE FUNCTION username_change_log_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'UPDATE' AND OLD.name <> NEW.name THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.id,'changed the username from ' || OLD.name || ' to ' || NEW.name,1,3);

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

        INSERT INTO log(uid,description, action, level) VALUES(OLD.uid,'changed the permission from the user: ' || (SELECT name FROM qser WHERE id = NEW.uid) || '! Following permission was added: ' ||(SELECT name FROM berechtigung WHERE id = NEW.bid),1,3);

    END IF;

    IF TG_OP = 'DELETE' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.uid,' permission from the user: ' || (SELECT name FROM qser WHERE id = OLD.uid) || ' was taken! Following permission was taken: ' ||(SELECT name FROM berechtigung WHERE id = OLD.bid),1,3);

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

CREATE OR REPLACE FUNCTION user_installed_deleted_apt_list_trigger_function()
    RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.id,'user: ' || (SELECT name FROM qser WHERE id = NEW.uid) || ' has installed a new apt package! Following apt package was added: ' ||(SELECT name FROM aptlist WHERE id = NEW.id),1,3);

    END IF;

    IF TG_OP = 'UPDATE' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.id,' permission from the user: ' || (SELECT name FROM qser WHERE id = OLD.uid) || ' was taken! Following permission was taken: ' ||(SELECT name FROM berechtigung WHERE id = OLD.bid),1,3);

    END IF;

    IF TG_OP = 'DELETE' THEN

        INSERT INTO log(uid,description, action, level) VALUES(OLD.id,' permission from the user: ' || (SELECT name FROM qser WHERE id = OLD.uid) || ' was taken! Following permission was taken: ' ||(SELECT name FROM berechtigung WHERE id = OLD.bid),1,3);

    END IF;



    RETURN NEW;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE TRIGGER user_installed_deleted_apt_list_trigger
    BEFORE INSERT OR DELETE OR UPDATE ON aptlist
    FOR EACH ROW
EXECUTE FUNCTION user_installed_deleted_apt_list_trigger_function();
