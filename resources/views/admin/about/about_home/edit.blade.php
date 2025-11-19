@extends('admin.layouts.main')
@section('title', 'Hakkımızda Anasayfa Güncelleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Hakkımızda Anasayfa Güncelleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hakkımızda Anasayfa Yönetimi</li>
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
                            
                            @foreach($languages as $language)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $language->lang_code }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $language->lang_code }}"
                                            type="button" role="tab" aria-controls="tab-{{ $language->lang_code }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        <img src="{{ $language->domain .'/'. getFolder(['uploads_folder', 'images_folder'], $language->lang_code) .'/'.$language->flag_image }}" alt="{{ $language->title }}" style="width: 20px; margin-right: 5px;"> {{ strtoupper($language->lang_code) }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.home.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="myTabContent">
                            @foreach($aboutHomeContent as $key => $about)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{$about->lang}}" role="tabpanel" aria-labelledby="tab{{$about->lang}}-tab">
                                    <div class="card-body" style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">    
                                        <input type="hidden" name="lang_{{$about->lang}}" value="{{$about->lang}}">
                                        <input type="hidden" name="id" value="{{ $about->id }}">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="upper_title_{{ $about->lang }}" class="form-label">Üst Başlık ({{ $about->lang }})</label>
                                                <input type="text" class="form-control" id="upper_title_{{ $about->lang }}" name="upper_title_{{ $about->lang }}" value="{{ $about->upper_title }}" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="title_{{ $about->lang }}" class="form-label">Başlık ({{ $about->lang }})</label>
                                                <input type="text" class="form-control" id="title_{{ $about->lang }}" name="title_{{ $about->lang }}" value="{{ $about->title }}" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="title_1_{{ $about->lang }}" class="form-label">Alt Başlık ({{ $about->lang }})</label>
                                                <input type="text" class="form-control" id="title_1_{{ $about->lang }}" name="title_1_{{ $about->lang }}" value="{{ $about->title_1 }}" >
                                            </div>
                                            <!-- button_text --> 
                                            <div class="mb-3">
                                                <label for="button_text_{{ $about->lang }}" class="form-label">Buton Metni ({{ $about->lang }})</label>
                                                <input type="text" class="form-control" id="button_text_{{ $about->lang }}" name="button_text_{{ $about->lang }}" value="{{ $about->button_text }}" >
                                            </div>
                                            <!-- button_url -->
                                            <div class="mb-3">
                                                <label for="button_url_{{ $about->lang }}" class="form-label">Buton URL ({{ $about->lang }})</label>
                                                <input type="text" class="form-control" id="button_url_{{ $about->lang }}" name="button_url_{{ $about->lang }}" value="{{ $about->button_url }}" >
                                            </div>
                                        </div>
                                        <!-- title_1 -->
                                        

                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="image_{{ $about->lang }}" class="form-label">Görsel ({{ $about->lang }})</label>
                                                <input type="file" class="form-control" id="image_{{ $about->lang }}" name="image_{{ $about->lang }}" accept="image/*">
                                                @if($about->image)
                                                <img src="{{ $languages[$key]->domain .'/'. getFolder(['uploads_folder', 'images_folder'], $about->lang ) .'/'.$about->image }}" 
                                                    alt="{{ $about->title }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                                    <input type="hidden" class="form-control mt-2" name="old_image_{{ $about->lang }}" value="{{ $about->image }}" readonly>
                                                @endif
                                                <div class="mb-3">
                                                    <label for="alt_{{ $about->lang }}" class="form-label">Alt Metin ({{ $about->lang }})</label>
                                                    <input type="text" class="form-control" id="alt_{{ $about->lang }}" name="alt_{{ $about->lang }}" value="{{ $about->alt }}" >
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description_{{ $about->lang }}" class="form-label">Açıklama ({{ $about->lang }})</label>
                                                <textarea class="form-control" id="description_{{ $about->lang }}" name="description_{{ $about->lang }}" rows="3" >{{ $about->description }}</textarea>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                        </form>
                    </div>
                </div>
        </div>
        <!--end::App Content-->
@endsection