<div class="filter d-flex justify-content-around mx-2">
  <form action="{{route('filter.gallery.dashboard')}}" method="POST">
  @csrf
  @foreach ($categories as $category)
    <input 
      class="filter-input"
      type="checkbox" 
      name="category[]" 
      value="{{$category->id}}" 
      id="category-{{$category->id}}" 
      onchange="this.form.submit()" 
      {{ isset($selectedCategories) && in_array($category->id, $selectedCategories) ? 'checked' : ''}}>
    <label for="category-{{$category->id}}" class="filter-label">{{$category->title}}</label>
  @endforeach
  <small><a href="listimages" style="white-space: nowrap;" class="filter-label">Очистить фильтры</a></small>
  </form> 
</div>