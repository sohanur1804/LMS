<?php

namespace App\Http\Livewire;

use App\Models\Course;

use App\Models\Curriculum;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;
    public $end_date;
    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'selectedDays' => 'required',
        'time' => 'required',
    ];
    public function render()
    {
        return view('livewire.course-create');
    }

    public function formSubmit() {
        $this->validate();
        $course = Course::create([
            'name' => $this->name,
            // 'slug' => str_replace(' ', '-', $this->slug),
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => Auth::user()->id
        ]);

        $i = 1;
        $start_date = new DateTime(Carbon::now());
        $end_date = new DateTime($this->end_date);
        $interval = new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        foreach ($date_range as $date) {
            foreach ($this->selectedDays as $day) {
                if ($date->format('l') === $day) {
                    Curriculum::create([
                        'name' => $this->name . ' #' . $i++,
                        // 'week_day' => $day,
                        // 'class_time' => $this->time,
                        // 'end_date' => $this->end_date,
                        'course_id' => $course->id,
                    ]);
                }
            }
        }

        $i++;

        flash()->addSuccess('Course Created Successfully');
        return redirect()->route('course.index');
    }
}
