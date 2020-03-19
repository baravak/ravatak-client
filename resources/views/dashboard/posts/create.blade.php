@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="title" name="title" @formValue($post->title) placeholder="&nbsp;" autocomplete="off">
        <label for="title">{{__('Title')}}</label>
    </div>

    <div class="form-group form-group-m">
        <textarea name="content" id="content" rows="20" class="form-control form-control-m" placeholder="&nbsp;">{{isset($post->content) ? $post->content : null}}</textarea>
        <label for="content">{{__('Content')}}</label>
    </div>

    <div class="form-group form-group-m">
        <textarea name="summary" id="summary" rows="5" class="form-control form-control-m" placeholder="&nbsp;">{{isset($post->summary) ? $post->summary : null}}</textarea>
        <label for="summary">{{__('summary')}}</label>
    </div>
    @if ($module->action == 'create')
        <div class="form-group form-group-m">
            <select class="select2-select" name="primary_term_id" id="primary_term_id" data-url="{{route('dashboard.terms.index')}}">
            </select>
        </div>
    @endif
    <div class="form-group mb-0">
        <label>{{__('Status')}}</label>
        <div class="d-flex flex-wrap">
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-publish" value="publish" @radioChecked($post->status, 'publish')>
                <label for="status-publish">
                    <span class="fal fa-eye richak-icon"></span>
                    {{__('Publish')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-draft" value="draft" @radioChecked($post->status, 'draft')>
                <label for="status-draft">
                    <span class="fal fa-eye-slash richak-icon"></span>
                    {{__('Draft')}}
                </label>
            </div>
        </div>
    </div>

@endsection
