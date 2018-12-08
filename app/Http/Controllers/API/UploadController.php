<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\CourseFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    private $courseImageKey = 'course-image';
    private $courseFileKey = 'course-file';

    public function upload(Request $request)
    {

        $deleteUrl = '';
        $path = '';

        if ($request->hasFile($this->courseImageKey)) {

            $course_id = $request->input('course_id');
            $course = Course::find($course_id);

            $image = $request->file($this->courseImageKey);

            $path = $image->storePublicly('public/course/'. $course_id . '/cover');

            $course->cover_path = $path;
            $course->save();

            $deleteUrl = url('api/course/' . $course_id . '/cover/');

        } else if ($request->hasFile($this->courseFileKey)) {

            $course_id = $request->input('course_id');
            $course = Course::find($course_id);

            $file = $request->file($this->courseFileKey);

            $path = $file->storePublicly('public/course/'. $request->input('course_id') . '/files');

            $course->files()->save(new CourseFile(compact('path')));

            $deleteUrl = url('api/course/' . $course_id . '/file?path=' . urlencode($path));
        }

        $uploadResponse = [
            // 'error' => 'An error exception message if applicable',
            //'initialPreviewAsData' => true,
            'initialPreviewConfig' => [
                // configuration for each item in initial preview
                'url' => $deleteUrl
            ],
            //'initialPreviewThumbTags' => [
            //    // initial preview thumbnail tags configuration that will be replaced dynamically while rendering
            //],
            //'append' => true // whether to append content to the initial preview (or set false to overwrite)
        ];

        return response()->json($uploadResponse, 200);
    }

    public function deleteCover(Course $course) {

        Storage::delete($course->cover_path);

        $course->cover_path = "";
        $course->save();

        return response()->json();
    }

    public function deleteFile(Course $course, Request $request) {

        $path = $request->query('path');

        Storage::delete($path);

        $course->files()->where('path', $path)->delete();

        return response()->json();
    }

}
