@extends('admin.layouts.main')
@section('title', 'Kod Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Kod Güncelleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kod Güncelleme</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            @foreach($languages as $key => $language)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $language->lang_code }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $language->lang_code }}"
                                            type="button" role="tab" aria-controls="tab-{{ $language->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        <img src="{{ $language->domain .'/'. getFolder(['uploads_folder', 'images_folder'], $language->lang_code) .'/'.$language->flag_image }}" alt="{{ $language->title }}" style="width: 20px; margin-right: 5px;"> {{ strtoupper($language->lang_code) }}
                                    </button>
                                </li>
                            @endforeach
                        </ul> 
                    </div>
                    
                <div class="card-body">
                    <!-- Create Language Form -->
                    <form action="{{ route('admin.code.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="myTabContent">
                                @foreach($codes as $key => $language)
                            <input type="hidden" name="lang" value="{{ $language->lang }}">
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $language->lang }}" role="tabpanel" aria-labelledby="tab-{{ $language->id }}-tab">
                                <div class="card-body" style="display:grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
                                    
                                    <div class="mb-2">  
                                        <label for="ga_code_{{ $language->lang }}" class="form-label">Google Analytics Kodu</label>
                                        <textarea class="form-control" id="ga_code_{{ $language->lang }}" name="ga_code_{{ $language->lang }}">{{ $language->ga_code }}</textarea>
                                    </div>
                                    <div class="mb-2">  
                                        <label for="google_tag_manager_head_code_{{ $language->lang }}" class="form-label">Google Tag Manager (Head) Kodu</label>
                                        <textarea class="form-control" id="google_tag_manager_head_code_{{ $language->lang }}" name="google_tag_manager_head_code_{{ $language->lang }}">{{ $language->google_tag_manager_head_code }}</textarea>
                                    </div>
                                    <div class="mb-2">  
                                        <label for="google_tag_manager_body_code_{{ $language->lang }}" class="form-label">Google Tag Manager (Body) Kodu</label>
                                        <textarea class="form-control" id="google_tag_manager_body_code_{{ $language->lang }}" name="google_tag_manager_body_code_{{ $language->lang }}">{{ $language->google_tag_manager_body_code }}</textarea>
                                    </div>
                                    
                                    <div class="mb-2">  
                                        <label for="yandex_metrica_code_{{ $language->lang }}" class="form-label">Yandex Metrica Kodu</label>
                                        <textarea class="form-control" id="yandex_metrica_code_{{ $language->lang }}" name="yandex_metrica_code_{{ $language->lang }}">{{ $language->yandex_metrica_code }}</textarea>
                                    </div>
                                    <div class="mb-2">  
                                        <label for="facebook_pixel_code_{{ $language->lang }}" class="form-label">Facebook Pixel Kodu</label>
                                        <textarea class="form-control" id="facebook_pixel_code_{{ $language->lang }}" name="facebook_pixel_code_{{ $language->lang }}">{{ $language->facebook_pixel_code }}</textarea>
                                    </div>
                                    <div class="mb-2">  
                                        <label for="microsoft_clarity_code_{{ $language->lang }}" class="form-label">Microsoft Clarity Kodu</label>
                                        <textarea class="form-control" id="microsoft_clarity_code_{{ $language->lang }}" name="microsoft_clarity_code_{{ $language->lang }}">{{ $language->microsoft_clarity_code }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="bitrix_form_code_{{ $language->lang }}" class="form-label">Bitrix Form Kodu</label>
                                        <textarea class="form-control" id="bitrix_form_code_{{ $language->lang }}" name="bitrix_form_code_{{ $language->lang }}">{{ $language->bitrix_form_code }}</textarea>
                                    </div>
                                    <div class="mb-2">  
                                        <label for="bitrix_widget_code_{{ $language->lang }}" class="form-label">Bitrix Widget Kodu</label>
                                        <textarea class="form-control" id="bitrix_widget_code_{{ $language->lang }}" name="bitrix_widget_code_{{ $language->lang }}">{{ $language->bitrix_widget_code }}</textarea>
                                    </div>
                                    
                                </div>
                                <!-- Submit Button -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection