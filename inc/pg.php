<?php
/* Osmium
 * Copyright (C) 2012 Romain "Artefact2" Dalmaso <artefact2@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$__osmium_pg_link = null;

function osmium_pg_connect() {
  global $__osmium_config, $__osmium_pg_link;
  $host = $__osmium_config['host'];
  $port = $__osmium_config['port'];
  $user = $__osmium_config['user'];
  $password = $__osmium_config['password'];
  $dbname = $__osmium_config['dbname'];

  return $__osmium_pg_link = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname");
}

function osmium_pg_query_params($query, array $params) {
  global $__osmium_pg_link;
  if($__osmium_pg_link === null) osmium_pg_connect();

  return pg_query_params($__osmium_pg_link, $query, $params);
}