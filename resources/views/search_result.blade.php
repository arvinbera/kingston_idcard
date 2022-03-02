<h2>Search Result...</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>College ID</th>
                <th>College Name</th>
                <th></th>
            </tr>
        </thead>

        <?php $i = 1; ?>
        @foreach($students as $student)
        <tbody>
            <tr>
                <td><?php echo $i; ?></td>
                <td><a onclick='idcard_details("<?php echo $student->college_id; ?>")' style="cursor: pointer; color: blue;">{{$student->student_name}}</a></td>
                <td><a onclick='idcard_details("<?php echo $student->college_id; ?>")' style="cursor: pointer; color: blue;">{{$student->college_id}}</a></td>
                <td>{{$student->college_name}}</td>
                <td style="cursor: pointer; color: blue;"><a href="/idcard_info_edit/<?php echo $student->id; ?>"><span class="iconify" data-icon="fe:pencil"></span></a></td>
            </tr>
            <?php $i++; ?>
        </tbody>
        @endforeach

        @if(count($students)==0 || !$students)
        <tbody>
            <tr style="color: red;">
                <td> No record found...</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        @endIf

    </table>
</div>