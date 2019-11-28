<?php
// les listing de topics sur le forum  2

//$result =  App::getDatabase()->myQuery("SELECT * from forum_posts WHERE  id= 2");
//var_dump($result);

// recuperer tout les topic relier à forum

#si non connecte

/*$result = App::getDatabase()->myQuery("SELECT * from forum_topic WHERE  forum_posts_id= 2"); #pour les personnes non connecter
var_dump($result->fetchAll());

#sinon

$req="SELECT forum_topic.*, forum_topic_track.read_at from forum_topic
 LEFT  JOIN forum_topic_track ON (forum_topic_track.topic_id = forum_topic.id) AND forum_topic_track.user_id=2
 WHERE  forum_posts_id= 2 ";

$result = App::getDatabase()->myQuery($req); #pour les personnes non connecter
var_dump($result->fetchAll());*/

//la page de Consultation d'un topic

//sinon non connectee
$req="SELECT * FROM forum_topic WHERE id=1";
var_dump(App::getDatabase()->myQuery($req)->fetch());

//et pour avoir le forum conserné par ce topic on fait :


$req="SELECT * FROM forum_posts WHERE id=2";
var_dump(App::getDatabase()->myQuery($req)->fetch());

// sinon si c'est connecter
//$req="SELECT forum_topic.*, forum_topic_track.read_at from forum_topic
 //LEFT  JOIN forum_topic_track ON (forum_topic_track.topic_id = forum_topic.id) AND forum_topic_track.user_id=2
 //WHERE  forum_topic.id= 1   limit 1";

//var_dump(App::getDatabase()->myQuery($req)->fetch());

//si le topic n'est pas lu dans ce cas on met à jour le topic track
/*$req="UPDATE forum_topic_track SET read_at=NOW() WHERE  user_id=2 AND forum_topic_track.topic_id=1";

var_dump(App::getDatabase()->myQuery($req));*/

//si on veut connaitre  tous le topics non lu du forum en question ici forum(2)

/*$req="SELECT forum_topic.*, forum_topic_track.read_at from forum_topic
 LEFT  JOIN forum_topic_track ON (forum_topic_track.topic_id = forum_topic.id) AND forum_topic_track.user_id=2
 WHERE  (read_at IS NULL OR read_at < message_at) AND  forum_topic.forum_posts_id=2";

var_dump(App::getDatabase()->myQuery($req)->fetch());*/

//apres avoir faire un update ou insert dans forum_post_trac on nettois topic_track
$req ="DELETE FROM forum_topic_track WHERE forum_post_id =2 AND user_id=2";
var_dump(App::getDatabase()->myQuery($req)->fetch());