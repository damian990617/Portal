<div class="container pt-4 mb-4">
    <div class="row">
        <div class="col-md-4 col-xs-12 mb-4">
            @partial('profile.menu')
        </div>
        <div class="col-md-8 col-xs-12">
            <h3 class="fw-bold fs-3">Nowe ogłoszenie</h3>
            <form action="{{ route('Front::portal.offers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="input--name" class="form-label">Nazwa</label>
                    <input type="text" name="name" class="form-control" id="input--name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="mb-3">
                            <label for="input--category" class="form-label">Kategoria</label>
                            <select name="category_id" class="form-control" id="input--category" value="{{ old('category_id') }}">
                                <option selected disabled>Wybierz</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="mb-3">
                            <label for="input--price" class="form-label">Cena</label>
                            <input type="number" name="price" class="form-control" id="input--price" value="{{ old('price') }}">
                            @if($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="mb-3">
                            <label for="input--negotiate" class="form-label">Do negocjacji</label><br>
                            <input type="checkbox" name="negotiate" id="input--negotiate" @if(old('negotiate')) checked @endif>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="input--short_content" class="form-label">Krótka treść</label>
                    <textarea name="short_content" class="form-control"
                              id="input--short_content">{{ old('short_content', '') }}</textarea>
                    @if($errors->has('short_content'))
                        <span class="text-danger">{{ $errors->first('short_content') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--content" class="form-label">Treść</label>
                    <textarea name="content" class="form-control"
                              id="input--content">{{ old('content', '') }}</textarea>
                    @if($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input-image" class="form-label">Zdjęcie</label>
                    <input class="form-control" type="file" id="input-image" name="image">
                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn">Utwórz</button>
            </form>
        </div>
    </div>
</div>
