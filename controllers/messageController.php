<?php

abstract class MsgController
{
    abstract public function sendMessage();
    abstract public function viewMessage($id);
    abstract public function deleteMessage($id);
}

class MessageController extends MsgController
{
    public function sendMessage()
    {
        Flight::auth()->check();

        $data = Flight::request()->data;
        $message = new message($data);
        $message->store();
        Flight::redirect("/");
    }
    public function viewMessage($id)
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM messages WHERE id = $id";
        $result = Flight::db()->query($sql);
        if ($result->num_rows < 1) {
            die('404, page not found.');
        }
        $message = $result->fetch_assoc();
        Flight::render('messageView', array('message' => $message));
    }
    public function deleteMessage($id)
    {
        Flight::auth()->checkIfAdmin();
        if (!isset(Flight::request()->data->messageID)) {
            $sql = "DELETE FROM messages WHERE id = $id";
            $result = Flight::db()->query($sql);
            Flight::redirect('/panel');
        } else {
            $id = Flight::request()->data->messageID;
            $sql = "DELETE FROM messages WHERE id = $id";
            $result = Flight::db()->query($sql);
            Flight::redirect('/panel');
        }

    }
}
