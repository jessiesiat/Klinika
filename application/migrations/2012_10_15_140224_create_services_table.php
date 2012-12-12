<?php

class Create_Services_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_services', function($table)
		{
			$table->increments('id');
			$table->string('service_name');
			$table->string('description');
			$table->decimal('cost', 9, 2);
			$table->timestamps();
		});

		DB::table('hc_services')->insert(array(
				'service_name' => 'General obstetrics',
				'description' => 'General obstetrics services provided at Rush are designed to provide a pleasant, safe atmosphere for the delivery of babies.',
				'cost' => '1000'
			));
		DB::table('hc_services')->insert(array(
				'service_name' => 'General gynecology',
				'description' => 'The Section of General Gynecology at Rush stresses the need for a balance in the surgical and nonsurgical aspects of gynecology.',
				'cost' => '1000'
			));
		DB::table('hc_services')->insert(array(
				'service_name' => 'Gynecologic oncology',
				'description' => 'For three decades Rush University Medical Center — a principal member of the National Cancer Institute\'s Gynecologic Oncology Group — has paved the way in multidisciplinary treatment of gynecologic cancers',
				'cost' => '1000'
			));
		DB::table('hc_services')->insert(array(
				'service_name' => 'Maternal-fetal medicine/high-risk obstetrics/ultrasound',
				'description' => 'The Section of Maternal-Fetal Medicine focuses on the care of high-risk mother and fetus. The section is also responsible for all antepartum admissions to its high-risk service as well as medical, surgical and other obstetrical complications of pregnancies.',
				'cost' => '1000'
			));
		DB::table('hc_services')->insert(array(
				'service_name' => 'Urogynecology and female pelvic reconstructive surgery',
				'description' => 'The Section of Urogynecology and Female Reconstructive Surgery provides comprehensive urogynecologic care, including consultations and treatment for urinary incontinence, pelvic organ and uterine prolapse, cystocele, rectocele, enterocele and fecal incontinence.',
				'cost' => '1000'
			));
		DB::table('hc_services')->insert(array(
				'service_name' => 'Reproductive endocrinology and infertility',
				'description' => ' The Section of Reproductive Endocrinology and Infertility provides up-to-date, comprehensive clinical and scientific evaluation and treatment of patients with infertility as well as a wide range of reproductive endocrine disorders.',
				'cost' => '1000'
			));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_services');
	}

}