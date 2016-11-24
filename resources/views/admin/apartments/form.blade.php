{{ csrf_field() }}

<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ $apartment->name or null }}">
	</div>
	<div class="form-group">
    <label>Cover Image:</label>
    <div class="row">
    	<div class="col-md-3">
    		<img class="img-responsive thumbnail" id="cover_image" src="{{ $apartment->cover_image or 'http://placehold.it/350?text=image' }}"></img>
    	</div>
    	<div class="col-md-9">
    		<input type="file" class="form-control" name="cover_image" value="{{ $apartment->name or null }}" onchange="Loader.image(event, 'cover_image')">			
		</div>
    </div>
    
	</div>
<div class="form-group">
    <label>Address:</label>
    <input type="text" class="form-control" name="address"  value="{{ $apartment->address or null }}">
	</div>
	<div class="form-group">
    <label>District:</label>
    <input type="text" class="form-control" name="district"  value="{{ $apartment->district or null }}">
	</div>
	<div class="form-group">
    <label>Price:</label>
    <input type="number" class="form-control" name="price" value="{{ $apartment->price or null }}">
	</div>
	<div class="form-group">
    <label>Bedroom Total:</label>
    <input type="number" class="form-control" name="bedroom_total" value="{{ $apartment->bedroom_total or null }}">
	</div>
	<div class="form-group">
    <label>Unit Total:</label>
    <input type="number" class="form-control" name="unit_total" value="{{ $apartment->unit_total or null }}">
	</div>
	<div class="form-group">
    <label>Maintenance Fee:</label>
    <input type="number" class="form-control" name="maintenance_fee" value="{{ $apartment->maintenance_fee or null }}">
	</div>
	<div class="form-group">
    <label>Facilities:</label>
    <select class="form-control select2" name="facilities[]" multiple="multiple">
		@if(isset($apartment->facilities))
            @foreach($apartment->facilities as $facility)
    			<option value="{{ $facility }}" selected="selected">
    				{{ $facility }}
    			</option>
    		@endforeach
        @endif
    </select>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>