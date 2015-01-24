<p>Entry Number: <strong>{{$entry->id}}</strong></p>
<p>Author Writing Name: {{$entry->author}}</p>
<p>Author Email: {{$entry->authorEmail}}</p>
<p>Title: {{$entry->title}}</p>
<p>Category: {{$entry->category}}</p>
<p>Publisher: {{$entry->publisher}}</p>
<p>Editor: {{$entry->editor}}</p>
<p>Publication or Release Month (see rules): {{$entry->publicationMonth}}</p>
<p>Invoice Number: {{$entry->invoiceNumber}}</p>
@if ($entry->author2)
    <p>Author 2 First Name: {{$entry->author2}}</p>
    <p>Author 2 Last Name: {{$entry->author2}}</p>
    <p>Author 2 Writing Name: {{$entry->author2}}</p>
    <p>Author 2 Email: {{$entry->author2Email}}</p>
@endif
