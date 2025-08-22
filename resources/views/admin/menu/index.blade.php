@extends('admin.layouts.main')
@section('title', 'Menü Yönetimi')

@section('content')
   <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Menü Yönetimi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Menü Yönetimi</li>
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
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!-- /.col -->
              <div class="col-md-12">
                <!-- /.card -->
                <div class="card mb-4">
                  <div class="card-header" >
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="display:inline-block;" class="card-title">Striped Full Width Table</h3>
                        <a style="display:inline-block;" href="{{ route('admin.menu.create') }}" class="btn btn-sm btn-primary">Menü Ekle</a>
                    </div>
                    
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 30px">#</th>
                          <th>Başlık</th>
                          <th>Menü Tipi</th>
                          <th>Görsel</th>
                          <th  style="width: 300px">İşlem</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($menus as $menu): ?>
                        <tr class="align-middle">
                          <td><?=$menu->id?></td>
                          <td><?=$menu->title?></td>
                          <td>
                            <?=$menu->menu_type?>
                          </td>
                            <td>
                                <?php if($menu->image): ?>
                                <img src="{{ asset(getFolder(['uploads_folder', 'images_folder'], $menu->lang) . '/' . $menu->image) }}" alt="<?=$menu->title?>" style="width: 50px; height: 50px;">
                                <?php else: ?>
                                <span class="text-muted">Görsel Yok</span>
                                <?php endif; ?>
                            </td>
                          <td>
                            <a href="{{ route('admin.menu.edit', $menu->menu_id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                            <form action="{{ route('admin.menu.destroy', $menu->menu_id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
@endsection