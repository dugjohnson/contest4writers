<p>Author Writing Name: {{$entry->author}}</p>
<p>Author Email: {{$entry->authorEmail}}</p>
<p>Title: {{$entry->title}}</p>
<p>Category: {{$entry->category}}</p>
<p>Invoice Number: {{$entry->invoiceNumber}}</p>
@if ($entry->author2)
    <p>Author 2 First Name: {{$entry->author2firstName}}</p>
    <p>Author 2 Last Name: {{$entry->author2lastName}}</p>
    <p>Author 2 Writing Name: {{$entry->author2}}</p>
    <p>Author 2 Email: {{$entry->author2Email}}</p>
@endif
