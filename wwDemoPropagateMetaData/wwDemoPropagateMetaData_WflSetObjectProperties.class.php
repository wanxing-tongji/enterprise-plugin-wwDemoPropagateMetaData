<?php
/****************************************************************************
   Copyright 2013 WoodWing Software BV

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
****************************************************************************/

require_once BASEDIR . '/server/interfaces/services/wfl/WflSetObjectProperties_EnterpriseConnector.class.php';

class wwDemoPropagateMetaData_WflSetObjectProperties extends WflSetObjectProperties_EnterpriseConnector
{
	final public function getPrio()     { return self::PRIO_DEFAULT; }
	final public function getRunMode()  { return self::RUNMODE_BEFOREAFTER; }

	final public function runBefore( WflSetObjectPropertiesRequest &$req )
	{
	} 

	final public function runAfter( WflSetObjectPropertiesRequest $req, WflSetObjectPropertiesResponse &$resp )
	{
		LogHandler::Log( 'PropagateMetaData', 'DEBUG', 'Called: PropagateMetaData_WflSetObjectProperties->runAfter()' );
		require_once dirname(__FILE__) . '/config.php';

		// check if object is a layout and then run the handler	function
		PropagateMetaData::runAfter( $resp );

		LogHandler::Log( 'PropagateMetaData', 'DEBUG', 'Returns: PropagateMetaData_WflSetObjectProperties->runAfter()' );
	} 
	
	// Not called.
	final public function runOverruled( WflSetObjectPropertiesRequest $req )
	{
		$req = $req; // keep code analyzer happy
	} 
}
