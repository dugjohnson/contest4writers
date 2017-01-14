<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresheetsTable extends Migration {
/*CREATE TABLE IF NOT EXISTS `daphnescoresheet` (
`entrytitle` varchar(100) DEFAULT NULL,
`entrycategory` varchar(2) DEFAULT NULL,
`published` tinyint(1) DEFAULT NULL,
`entryid` int(11) DEFAULT NULL,
`judgeid` int(11) DEFAULT NULL,
`judgename` varchar(100) DEFAULT NULL,
`finalscore` int(3) DEFAULT NULL,
`score01` int(1) DEFAULT NULL,
`comment01` text,
`score02` int(1) DEFAULT NULL,
`comment02` text,
`score03` int(1) DEFAULT NULL,
`comment03` text,
`score04` int(1) DEFAULT NULL,
`comment04` text,
`score05` int(1) DEFAULT NULL,
`comment05` text,
`score06` int(1) DEFAULT NULL,
`comment06` text,
`score07` int(1) DEFAULT NULL,
`comment07` text,
`score08` int(1) DEFAULT NULL,
`comment08` text,
`score09` int(1) DEFAULT NULL,
`comment09` text,
`score10` int(1) DEFAULT NULL,
`comment10` text,
`score11` int(1) DEFAULT NULL,
`comment11` text,
`score12` int(1) DEFAULT NULL,
`comment12` text,
`score13` int(1) DEFAULT NULL,
`comment13` text,
`score14` int(1) DEFAULT NULL,
`comment14` text,
`score15` int(1) DEFAULT NULL,
`comment15` text,
`score16` int(1) DEFAULT NULL,
`comment16` text,
`score17` int(1) DEFAULT NULL,
`comment17` text,
`score18` int(1) DEFAULT NULL,
`comment18` text,
`score19` int(1) DEFAULT NULL,
`comment19` text,
`score20` int(1) DEFAULT NULL,
`comment20` text,
`score21` int(1) DEFAULT NULL,
`comment21` text,
`score22` int(1) DEFAULT NULL,
`comment22` text,
`score23` int(1) DEFAULT NULL,
`comment23` text,
`score24` int(1) DEFAULT NULL,
`comment24` text,
`score25` int(1) DEFAULT NULL,
`comment25` text,
`bonus1` tinyint(1) DEFAULT NULL,
`bonus2` tinyint(1) DEFAULT NULL,
`bonus3` tinyint(1) DEFAULT NULL,
`tiebreaker` int(2) DEFAULT NULL,
`commentfinal` text,
PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1122 ;
*/
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scoresheets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('assignment_id');
//			$table->integer('judge_id');
//			$table->integer('entry_id');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scoresheets');
	}

}
