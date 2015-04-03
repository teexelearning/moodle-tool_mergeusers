<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 
/**
 * The merge_completed event.
 *
 * @package    tool_mergeusers
 * @copyright  2015 Ray Morris
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace tool_mergeusers\event;
defined('MOODLE_INTERNAL') || die();
/**
 * The merge_completed event class.
 *
 * @since     tool_mergeusers 1.10.2
 * @copyright 2014 YOUR NAME
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
class  extends \core\event\base {
    protected function init() {
        $this->data['crud'] = 'u'; // c(reate), r(ead), u(pdate), d(elete)
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = 'tool_mergeusers';
    }
 
    public static function get_name() {
        return get_string('eventmerge_completed', 'tool_mergeusers');
    }
 
    public function get_description() {
        return "The user with id {$this->userid} merged user {$this->relateduserid} to $this->newuserid.";
    }
 
    public function get_url() {
        return new \moodle_url('/admin/tool/mergeusers/log.php', array('id' => $this->objectid));
    }
 
    public static function get_legacy_eventname() {
        return 'merging_success';
    }
 
    protected function get_legacy_eventdata() {
        $data = new \stdClass();
        $data->id = $this->objectid;
        $data->userid = $this->relateduserid;
        $data->oldid = $this->relateduserid;
        return $data;
    }
}
