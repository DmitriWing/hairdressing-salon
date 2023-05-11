<div class="filter d-flex justify-content-around">
  <form action="{{route('filter.gallery')}}" method="POST">
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
  </form> 
  <a href="gallery" class="filter-label">Очистить фильтры</a>
</div>
  