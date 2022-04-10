<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animations')->delete();

        $animations = array(
            array('title' => 'Bounce','css_class' => 'bounce'),
            array('title' => 'Flash','css_class' => 'flash'),
            array('title' => 'Pulse','css_class' => 'pulse'),
            array('title' => 'Rubber Band','css_class' => 'rubberBand'),
            array('title' => 'Shake','css_class' => 'shake'),
            array('title' => 'Head Shake','css_class' => 'headShake'),
            array('title' => 'Swing','css_class' => 'swing'),
            array('title' => 'Tada','css_class' => 'tada'),
            array('title' => 'Wobble','css_class' => 'wobble'),
            array('title' => 'Jello','css_class' => 'jello'),
            array('title' => 'Bounce In','css_class' => 'bounceIn'),
            array('title' => 'Bounce In Down','css_class' => 'bounceInDown'),
            array('title' => 'Bounce In Left','css_class' => 'bounceInLeft'),
            array('title' => 'Bounce In Right','css_class' => 'bounceInRight'),
            array('title' => 'Bounce In Up','css_class' => 'bounceInUp'),
            array('title' => 'Bounce Out','css_class' => 'bounceOut'),
            array('title' => 'Bounce Out Down','css_class' => 'bounceOutDown'),
            array('title' => 'Bounce Out Left','css_class' => 'bounceOutLeft'),
            array('title' => 'Bounce Out Right','css_class' => 'bounceOutRight'),
            array('title' => 'Bounce Out Up','css_class' => 'bounceOutUp'),
            array('title' => 'Fade In','css_class' => 'fadeIn'),
            array('title' => 'Fade In Down','css_class' => 'fadeInDown'),
            array('title' => 'Fade In Down Small','css_class' => 'fadeInDownSm'),
            array('title' => 'Fade In Down Big','css_class' => 'fadeInDownBig'),
            array('title' => 'Fade In Left','css_class' => 'fadeInLeft'),
            array('title' => 'Fade In Left Big','css_class' => 'fadeInLeftBig'),
            array('title' => 'Fade In Right','css_class' => 'fadeInRight'),
            array('title' => 'Fade In Right Big','css_class' => 'fadeInRightBig'),
            array('title' => 'Fade In Up','css_class' => 'fadeInUp'),
            array('title' => 'Fade In Up Small','css_class' => 'fadeInUpSm'),
            array('title' => 'Fade In Up Big','css_class' => 'fadeInUpBig'),
            array('title' => 'Fade Out','css_class' => 'fadeOut'),
            array('title' => 'Fade Out Down','css_class' => 'fadeOutDown'),
            array('title' => 'Fade Out Down Big','css_class' => 'fadeOutDownBig'),
            array('title' => 'Fade Out Left','css_class' => 'fadeOutLeft'),
            array('title' => 'Fade Out Right','css_class' => 'fadeOutRight'),
            array('title' => 'Fade Out Right Big','css_class' => 'fadeOutRightBig'),
            array('title' => 'Fade Out Up','css_class' => 'fadeOutUp'),
            array('title' => 'Flip','css_class' => 'animated flip'),
            array('title' => 'flip In X','css_class' => 'flipInX'),
            array('title' => 'flip In Y','css_class' => 'flipInY'),
            array('title' => 'flip out X','css_class' => 'flipOutX'),
            array('title' => 'flip out Y','css_class' => 'flipOutY'),
            array('title' => 'Light Speed In','css_class' => 'lightSpeedIn'),
            array('title' => 'Light Speed Out','css_class' => 'lightSpeedOut'),
            array('title' => 'Rotate In','css_class' => 'rotateIn'),
            array('title' => 'Rotate In Down Left','css_class' => 'rotateInDownLeft'),
            array('title' => 'Rotate In Down Right','css_class' => 'rotateInDownRight'),
            array('title' => 'Rotate In Up Left','css_class' => 'rotateInUpLeft'),
            array('title' => 'Rotate In Up Right','css_class' => 'rotateInUpRight'),
            array('title' => 'Rotate Out','css_class' => 'rotateOut'),
            array('title' => 'Rotate Out Down Left','css_class' => 'rotateOutDownLeft'),
            array('title' => 'Rotate Out Down Right','css_class' => 'rotateOutDownRight'),
            array('title' => 'Rotate Out Up Left','css_class' => 'rotateOutUpLeft'),
            array('title' => 'Rotate Out Up Right','css_class' => 'rotateOutUpRight'),
            array('title' => 'Hinge','css_class' => 'hinge'),
            array('title' => 'Jack In The Box','css_class' => 'jackInTheBox'),
            array('title' => 'Roll In','css_class' => 'rollIn'),
            array('title' => 'Roll Out','css_class' => 'rollOut'),
            array('title' => 'Zoom In','css_class' => 'zoomIn'),
            array('title' => 'Zoom In Down','css_class' => 'zoomInDown'),
            array('title' => 'Zoom In Left','css_class' => 'zoomInLeft'),
            array('title' => 'Zoom In Right','css_class' => 'zoomInRight'),
            array('title' => 'Zoom In Up','css_class' => 'zoomInUp'),
            array('title' => 'Zoom Out','css_class' => 'zoomOut'),
            array('title' => 'Zoom Out Down','css_class' => 'zoomOutDown'),
            array('title' => 'Zoom Out Left','css_class' => 'zoomOutLeft'),
            array('title' => 'Zoom Out Right','css_class' => 'zoomOutRight'),
            array('title' => 'Zoom Out Up','css_class' => 'zoomOutUp'),
            array('title' => 'Slide In Down','css_class' => 'slideInDown'),
            array('title' => 'Slide In Left','css_class' => 'slideInLeft'),
            array('title' => 'Slide In Left','css_class' => 'slideInLeft'),
            array('title' => 'Slide In Right','css_class' => 'slideInRight'),
            array('title' => 'Slide Up','css_class' => 'slideInUp'),
            array('title' => 'Slide Out Down','css_class' => 'slideOutDown'),
            array('title' => 'Slide Out Right','css_class' => 'slideOutRight'),
            array('title' => 'Slide Out Up','css_class' => 'slideOutUp'),
        );

        DB::table('animations')->insert($animations);
    }
}
