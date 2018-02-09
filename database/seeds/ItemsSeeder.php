<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            [
                'name' => 'Lorem ipsum',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla, odio nec gravida semper, enim quam lacinia tortor, in luctus erat justo vitae justo. Quisque molestie ex id felis finibus dictum. Fusce augue nibh, placerat id tellus sed, vehicula semper neque. Nulla id placerat neque, at cursus augue. Proin tristique pretium leo. Aenean vehicula euismod mattis. Aenean eu nisi ut velit volutpat euismod et at felis. Integer dui arcu, laoreet in libero quis, suscipit dapibus mauris. Sed tincidunt orci sollicitudin vulputate egestas. Praesent gravida eget tortor eget dictum. Mauris aliquet augue est, sit amet feugiat turpis faucibus et. Sed interdum sapien eget aliquam dignissim. Pellentesque tempus at magna in eleifend.',
                'price' => 353,
                'activated' => true,
            ],
            [
                'name' => 'Nam hendrerit',
                'description' => 'Nam hendrerit mi nisi, vel pellentesque dolor ornare et. In at nunc quam. Duis tempor fermentum mauris. Etiam blandit placerat massa quis sollicitudin. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus id dapibus nibh. Nullam dui enim, tristique sed leo non, consectetur viverra eros.',
                'price' => 435,
                'activated' => true,
            ],
            [
                'name' => 'Aenean ultrices',
                'description' => 'Aenean ultrices arcu eu elit posuere, imperdiet molestie lorem vulputate. Sed cursus massa vitae ultricies vulputate. Cras ac pretium nibh, sollicitudin suscipit justo. Curabitur elementum justo iaculis eros fringilla, finibus ullamcorper nibh bibendum. Quisque at aliquam purus. Vestibulum rhoncus rhoncus tortor, sit amet fringilla libero hendrerit nec. Aenean vel erat aliquam, venenatis massa a, feugiat tellus. Etiam viverra viverra dapibus. Nam ut diam leo. In a tempor enim. Ut ac neque vehicula, cursus sapien a, convallis urna.',
                'price' => 785,
                'activated' => true,
            ],
        ]);
    }
}
