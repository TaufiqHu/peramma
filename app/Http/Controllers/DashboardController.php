<?php

namespace App\Http\Controllers;

use App\Book;
use App\ClassRoom;
use App\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'title'             => 'Dashboard',
            'bookCount' => (int)Book::sum('stock'),
            'studentCount' => Student::count(),
            'ClassRoomCount' => ClassRoom::count(),

        );

        return view('admin.dashboard', $data);
    }
}
