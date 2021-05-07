<!DOCTYPE Html PUBLIC "-//W3C//DTD Html 4.0 Transitional//EN">
<Html>
<BODY>
<P><B>RWA&reg; Mystery/Suspense Chapter presents</B></P>

<P><B>The Daphne du Maurier Award</B></P>

<P><B>FOR EXCELLENCE IN MYSTERY/SUSPENSE UNPUBLISHED DIVISION {{ $contest_year }}</B></P>
<P>Dear {{$judge->first_name}} {{$judge->last_name}}</P>
<P>We thank you for your help with judging the finalists. See information below.</P>

<p>The entries we'd like you to judge</p>
 @foreach( $scoresheets as $sheet)
     <p>Title: {{$sheet->title}}</p>
     <p>Link to download the entry: <a href="https://writingcontest.website/uploads/entries/{{$sheet->entry->final_filename}}">writingcontest.website/uploads/entries/{{$sheet->entry->final_filename}}</a></p>
     <p>Link to edit the score sheet: <a href="https://writingcontest.website/scoresheets/finalist/{{$sheet->lookup_code}}/edit">writingcontest.website/scoresheets/finalist/{{$sheet->lookup_code}}/edit</a></p>
     <hr>
 @endforeach

<p>You have {{count($scoresheets)}} entries so when you rank your entries you should rank each entry in order from 1 to {{count($scoresheets)}} with 1 being your winner.</p>
<p>Thank you again for your help. When you have finished, please reply to this email and let us know that you are done.</p>
</BODY>
</Html>
