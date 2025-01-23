@csrf

<label for="title">Title</label>
<input class="form-control" type="text" name="title" id="title" value="{{ old("title", $post->title) }}">

<label for="slug">Slug</label>
<input class="form-control" type="text" name="slug" id="slug" value="{{old("slug", $post->slug) }}" >

<label for="content">Content</label>
<textarea class="form-control" name="content" id="content">{{ old("content", $post->content) }} </textarea>

<label for="category_id">Category</label>
<select class="form-control" name="category_id" id="category_id">
  @forelse ($categories as $id => $title)
    <option value="{{ $id }}" {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}>{{ $title }}</option>
  @empty
    <option value="">No categories available</option>
  @endforelse
</select>

<label for="description">Description</label>
<textarea  class="form-control" name="description" id="description">{{ old('description', $post->description) }}</textarea>

<label for="posted">Posted</label>
<select class="form-control" name="posted" id="posted">
      <option {{$post->posted == "not" ? 'selected' : '' }} value="not">Not</option>
      <option {{$post->posted == "yes" ? 'selected' : '' }} value="yes">Yes</option>
</select>

@if (isset($task) && $task == "edit")
      <label for="">image</label>
    <input class="form-control" type="file" name="image">
@endif




<button class="btn btn-success mt-10 " type="submit">Send</button>