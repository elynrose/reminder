<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPinRequest;
use App\Http\Requests\StorePinRequest;
use App\Http\Requests\UpdatePinRequest;
use App\Models\Location;
use App\Models\Pin;
use App\Models\Reminder;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PinsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pins = Pin::with(['location', 'reminder', 'media'])->get();

        return view('admin.pins.index', compact('pins'));
    }

    public function create()
    {
        abort_if(Gate::denies('pin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reminders = Reminder::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pins.create', compact('locations', 'reminders'));
    }

    public function store(StorePinRequest $request)
    {
        $pin = Pin::create($request->all());

        if ($request->input('photo', false)) {
            $pin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pin->id]);
        }

        return redirect()->route('admin.pins.index');
    }

    public function edit(Pin $pin)
    {
        abort_if(Gate::denies('pin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reminders = Reminder::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pin->load('location', 'reminder');

        return view('admin.pins.edit', compact('locations', 'pin', 'reminders'));
    }

    public function update(UpdatePinRequest $request, Pin $pin)
    {
        $pin->update($request->all());

        if ($request->input('photo', false)) {
            if (! $pin->photo || $request->input('photo') !== $pin->photo->file_name) {
                if ($pin->photo) {
                    $pin->photo->delete();
                }
                $pin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($pin->photo) {
            $pin->photo->delete();
        }

        return redirect()->route('admin.pins.index');
    }

    public function show(Pin $pin)
    {
        abort_if(Gate::denies('pin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pin->load('location', 'reminder');

        return view('admin.pins.show', compact('pin'));
    }

    public function destroy(Pin $pin)
    {
        abort_if(Gate::denies('pin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pin->delete();

        return back();
    }

    public function massDestroy(MassDestroyPinRequest $request)
    {
        $pins = Pin::find(request('ids'));

        foreach ($pins as $pin) {
            $pin->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pin_create') && Gate::denies('pin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
