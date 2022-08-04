@extends('layouts.admin')

@section('content-header')
    <x-content-header>Добавить товар
        @error('field')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </x-content-header>
@endsection

@section('content')
    <div class="col-12 ">
        <form action="{{ route('admin.product.store') }}"
        enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-xl-4">
                    <div class="mb-3">
                        <label class="form-label">Введите название<span class="text-danger">*</span></label>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Введите краткое описание<span class="text-danger">*</span></label>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Введите полное описание<span class="text-danger">*</span></label>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea name="content" class="form-control" cols="30" rows="8">{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Введите цену<span class="text-danger">*</span></label>
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Введите скидку</label>
                        @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="number" name="discount" value="{{ old('discount') ? old('discount') : 0 }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Введите количество товара на складе</label>
                        @error('count')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="number" name="count" value="{{ old('count') ? old('count') : 0 }}"
                            class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="mb-3">
                        <label class="form-label">Загрузите главное изображание</label>
                        @error('main_image')
                            <div class="text-danger">Добавьте главное изображение</div>
                        @enderror
                        <input class="form-control" type="file" name="main_image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Загрузите дополнитеьные изображения</label>
                        @error('images')
                            <div class="text-danger">Добавьте три изображения</div>
                        @enderror
                        <input class="form-control mb-3" type="file" name="images[]">
                        <input class="form-control mb-3" type="file" name="images[]">
                        <input class="form-control mb-3" type="file" name="images[]">
                    </div>

                    <div class="form-group mb-3">
                        <label>Выберите брэнд</label>
                        @error('company_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <select class="form-control select2"
                        name="company_id"
                        style="width: 100%;">
                        <option selected disabled>Выберите брэнд</option>
                          @foreach ($companies as $company)
                            <option id="company{{$company->id}}"
                            {{old('company_id') == $company->id ? 'selected' : ''}}
                            value="{{$company->id}}">{{$company->title}}</option>
                          @endforeach
                        </select>
                      </div>

                    <div class="form-group mb-3">
                        <label>Выберите цвет</label>
                        @error('color_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group clearfix">
                            @foreach ($colors as $color)
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radio{{$color->id}}" value="{{$color->id}}" name="color_id">
                                <label for="radio{{$color->id}}">
                                    <x-color :color="$color->title_en"></x-color>
                                </label>
                              </div>
                            @endforeach
                        </div>

                      </div>

                    <div class="form-group mb-3">
                        <label>Выберите категорию</label>
                        @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <select class="form-control select2"
                        name="category_id"
                        id="DropdownCategory"
                        style="width: 100%;">
                        <option selected disabled>Выберите категорию</option>
                          @foreach ($categories as $category)
                            <option id="category{{$category->id}}"
                            {{old('category_id') == $category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                          @endforeach
                        </select>
                      </div>

                      <label>Выберите подкатегории</label>
                      @error('subcategories')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      <div class="card">
                        <div class="card-body">
                            @foreach ($categories as $category)
                            <div class="form-group mb-3 clearfix d-none" id="subCategoriesGroup{{$category->id}}">
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="subcategory{{$subcategory->id}}"
                                        name="subcategories[]" value="{{$subcategory->id}}">
                                        <label for="subcategory{{$subcategory->id}}">
                                            {{$subcategory->title}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        </div>
                      </div>
                </div>
            </div>
            @if($errors)
                @foreach ($errors as $error)
                    <h4>{{$error}}</h4>
                @endforeach
            @endif
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection


@section('script')
<script>
    $(function () {
        let old;

        function changeCategory() {
            let a = $('#DropdownCategory :selected').val();
            $(`#subCategoriesGroup${a}`).removeClass('d-none');
            if(old) {
                $(`#subCategoriesGroup${old}`).addClass('d-none');
            }
            old = a;
        }

        if($('#DropdownCategory').val()) {
            changeCategory()
        }

        $('#DropdownCategory').change(function () {
            changeCategory()
        })
    })
</script>
@endsection
