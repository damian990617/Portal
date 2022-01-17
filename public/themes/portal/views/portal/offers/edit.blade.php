<div class="container pt-4 mb-4">
    <div class="row">
        <div class="col-md-4 col-xs-12 mb-4">
            @partial('profile.menu')
        </div>
        <div class="col-md-8 col-xs-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold fs-3">Edytuj oferte</h3>
                @if($item->active)
                    <a class="btn" href="{{ route('Front::portal.offers.show', ['offer' => $item->slug]) }}">Podgląd</a>
                @endif
            </div>
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <form action="{{ route('Front::portal.profile.offers.update', ['id' => $item->id]) }}" method="POST"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="input--name" class="form-label">Nazwa</label>
                    <input type="text" name="name" class="form-control" id="input--name" value="{{ $item->name }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="mb-3">
                            <label for="input--category" class="form-label">Kategoria</label>
                            <select name="category_id" class="form-control" id="input--category">
                                <option selected disabled>Wybierz</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($item->category_id == $category->id) selected @endif>{{ $category->name }}</option>
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
                            <input type="number" name="price" class="form-control" id="input--price"
                                   value="{{ $item->price }}">
                            @if($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="mb-3">
                            <label for="input--negotiate" class="form-label">Do negocjacji</label><br>
                            <input type="checkbox" name="negotiate" id="input--negotiate"
                                   @if($item->negotiate) checked @endif>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="input--short_content" class="form-label">Krótka treść</label>
                    <textarea name="short_content" class="form-control"
                              id="input--short_content">{{ $item->short_content }}</textarea>
                    @if($errors->has('short_content'))
                        <span class="text-danger">{{ $errors->first('short_content') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input--content" class="form-label">Treść</label>
                    <textarea name="content" class="form-control"
                              id="input--content">{{ $item->content }}</textarea>
                    @if($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="input-image" class="form-label">Zdjęcie</label>
                    <input class="form-control" type="file" id="input-image" name="image">
                </div>
                <div class="prod-images mb-4">
                    @if($item->hasMedia())
                        @foreach($item->getMedia() as $media)
                            <a href="{{ $item->getMediaUrl($media) }}">
                                <img src="{{ $item->getMediaUrl($media) }}" alt="{{$item->name}}">
                            </a>
                        @endforeach
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>
</div>
