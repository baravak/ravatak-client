@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <input type="number" class="form-control form-control-m" id="story_number" name="story_number" @formValue($story->story_number) placeholder="&nbsp;" autocomplete="off" min="1">
        <label for="story_number">{{__('Story number')}}</label>
    </div>
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="title" name="title" @formValue($story->title) placeholder="&nbsp;" autocomplete="off">
        <label for="title">{{__('Title')}}</label>
    </div>

    <div class="form-group form-group-m">
        <textarea name="content" id="content" rows="20" class="form-control form-control-m" placeholder="&nbsp;">{{isset($story->content) ? $story->content : null}}</textarea>
        <label for="content">{{__('Content')}}</label>
    </div>

    <div class="form-group form-group-m">
        <textarea name="summary" id="summary" rows="5" class="form-control form-control-m" placeholder="&nbsp;">{{isset($story->summary) ? $story->summary : null}}</textarea>
        <label for="summary">{{__('summary')}}</label>
    </div>

        <div class="form-group mb-0">
        <label>{{__('Status')}}</label>
        <div class="d-flex flex-wrap">
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-publish" value="publish" @radioChecked($story->status, 'publish')>
                <label for="status-publish">
                    <span class="fal fa-eye richak-icon"></span>
                    {{__('Publish')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-draft" value="draft" @radioChecked($story->status, 'draft')>
                <label for="status-draft">
                    <span class="fal fa-eye-slash richak-icon"></span>
                    {{__('Draft')}}
                </label>
            </div>
        </div>
    </div>

@endsection
