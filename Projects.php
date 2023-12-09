<?php



class Projects {

    public $projects;

    public static function getProjects() {

        $projects = scandir(__DIR__ . '/Projects');

        unset($projects[0]);
        unset($projects[1]);

        return json_encode($projects);

    }
}

?>