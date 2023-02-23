<form method="post" action="{{route('addbox')}}" enctype="multipart/form-data">
    @csrf
    <input type="number" name="id" placeholder="id"><br><br>
    <input type="text" name="name" placeholder="name"><br><br>
    <input type="file" name="image1" placeholder="image1"><br><br>
{{--    <input type="file" name="image2" placeholder="image2"><br><br>--}}
{{--    <input type="file" name="image3" placeholder="image3"><br><br>--}}
    <input type="text" name="dimentions" placeholder="dim"><br><br>
    <input type="number" name="price_conter" placeholder="pcon"><br><br>
    <input type="number" name="price_mdf" placeholder="pmdf"><br><br>
    <input type="text" name="type" placeholder="up or down"><br><br>
    <input type="submit" value="submit" >
{{--    <button type="submit" value="submit">Submit</button>--}}
</form>
