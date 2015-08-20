<?php
namespace Task;

use Mage\Task\AbstractTask;

class FixPermissions extends AbstractTask
{
	public function getName()
	{
		return 'Fixing file permissions';
	}

	public function run()
	{
		$command = 'chmod 755 . -R';
		$result = $this->runCommandRemote($command);

		if ( true == $result ) {
			$result = $this->fixCachePermissions();
		}

		if ( true == $result ) {
			$result = $this->fixLogsPermissions();
		}

		return $result;
	}


	public function fixCachePermissions() {
		$command = 'chmod 775 ./app/cache -R';
		$result = $this->runCommandRemote($command);

		return $result;
	}


	public function fixLogsPermissions() {
		$command = 'chmod 775 ./app/logs -R';
		$result = $this->runCommandRemote($command);

		return $result;
	}
}