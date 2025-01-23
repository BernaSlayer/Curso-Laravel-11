@csrf

<label for="title">Title</label>
<input class="form-control mt-2" type="text" name="title" id="title" value="{{ old("title", $category->title) }}">

<label for="slug">Slug</label>
<input class="form-control mt-2" type="text" name="slug" id="slug" value="{{old("slug", $category->slug) }}" >


<button class="btn btn-success my-10" type="submit">Send</button>