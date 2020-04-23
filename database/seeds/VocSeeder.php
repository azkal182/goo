<?php

use Illuminate\Database\Seeder;

class VocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('voc')->insert([
        [
          'tkp' => 'jakarta',
          'voucher' => 'voucher1',
      ],[
          'tkp' => 'jakarta',
          'voucher' => 'voucher2',
      ],[
          'tkp' => 'medan',
          'voucher' => 'voucher3',
      ],[
          'tkp' => 'medan',
          'voucher' => 'voucher4',
      ],[
          'tkp' => 'surabaya',
          'voucher' => 'voucher5',
        ]
      ]);
    }
}
