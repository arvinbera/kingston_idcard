<!-- front side start  -->
<?php if ($student->college_name == 'Kingston Polytechnic College') { ?>
    <div style="background-image: url(./images/kpc_front.jpg); background-size: 100% 100%;">
    <?php } elseif ($student->college_name == 'Kingston College of Science') { ?>
        <div style="background-image: url(./images/kcs_front.jpg); background-size: 100% 100%;">
        <?php } elseif ($student->college_name == 'Kingston Law College') { ?>
            <div style="background-image: url(./images/klc_front.jpg); background-size: 100% 100%;">
            <?php } elseif ($student->college_name == 'Kingston School of Management and Science') { ?>
                <div style="background-image: url(./images/ksms_front.jpg); background-size: 100% 100%;">
                <?php } elseif ($student->college_name == "Kingston Teachers' Training College") { ?>
                    <div style="background-image: url(./images/kttc_front.jpg); background-size: 100% 100%;">
                    <?php } elseif ($student->college_name == 'Kingston Model School') { ?>
                        <div style="background-image: url(./images/kms_front.jpg); background-size: 100% 100%;">
                        <?php } else { ?>
                            <div style="background-image: url(./images/kei_front.jpg); background-size: 100% 100%;">
                            <?php } ?>
                            <div class="front" id="section-to-print">
                                <div class="top {{$student->college_name == 'Kingston Model School' ? 'top_kms' : ''}}">
                                    <img src="./{{$student->student_photo}}" id="student_photo_div" />
                                </div>
                                <div class="bottom {{$student->college_name == 'Kingston Model School' ? 'bottom_kms' : ''}}">
                                    <p><span>Student ID: </span><b style="color:blue">{{$student->college_id}}</b></p>
                                    <p><span>Name: </span><b style="color:blue">{{$student->student_name}}</b></p>
                                    <p><span>Session: </span><b style="color:blue">{{$student->student_session}}</b></p>
                                    <p><span>Contact: </span><b style="color:blue">{{$student->student_mobile}}</b></p>
                                    <p><span>Blood Group: </span><b style="color:blue">{{$student->student_blood_group}}</b></p>
                                    <div class="barcode">
                                        @php
                                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                                        @endphp
                                        <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($student->college_id, $generatorPNG::TYPE_CODE_128)) }}">
                                        <!-- <img src="./images/barcode.png" /> -->
                                    </div>
                                    <?php if ($student->college_name != 'Kingston Model School') { ?>
                                        <div id="rotate-text" style="z-index: 1000; position: relative; bottom: 60px; right: 0; transform: rotate(-90deg); font-size: 12px; font-weight: bold;">
                                            <?php if (strpos($student->college_id, 'V/KPC') !== false || strpos($student->college_id, 'KTTC') !== false) { ?>
                                                <p style="text-transform: unset;">Valid till: <span style="color: blue; font-size: 16px;">July, <?php echo (int)substr($student->student_session, 0, 4) + 2; ?></span></p>
                                            <?php } elseif (strpos($student->college_id, 'KLC-BBA') !== false || strpos($student->college_id, 'KLC-BA') !== false) { ?>
                                                <p style="text-transform: unset;">Valid till: <span style="color: blue; font-size: 16px;">July, <?php echo (int)substr($student->student_session, 0, 4) + 5; ?></span></p>
                                            <?php } else { ?>
                                                <p style="text-transform: unset;">Valid till: <span style="color: blue; font-size: 16px;">July, <?php echo (int)substr($student->student_session, 0, 4) + 3; ?></span></p>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            </div>
                            <!-- front side end  -->

                            <div class="padding"></div>

                            <!-- back side start  -->
                            <!-- <div class="back">
                                <div class="display">
                                    <h1 class="details">Information</h1>
                                    <hr />
                                    <div class="details-info">
                                        <p>
                                            <span>Kingston Educational
                                                Institute</span>
                                        </p>
                                        <p><span>Name: </span>{{$student->student_name}}</p>
                                        <p><span>ID: </span>{{$student->college_id}}</p>
                                        <p><span>Session: </span>{{$student->student_session}}</p>
                                        <p><span>Blood Group: </span>{{$student->student_blood_group}}</p>
                                        <p><span>Contact: </span>{{$student->student_mobile}}</p>
                                    </div>
                                    <div class="barcode">
                                        @php
                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        @endphp
                                        {!! $generator->getBarcode('$student->college_id', $generator::TYPE_CODE_128) !!}
                                    </div>
                                    <hr />
                                </div>
                            </div> -->
                            <!-- back side end  -->

                            <form method="post" action="{{ url('/photo_upload') }}" class="form-group m-3 p-3" enctype="multipart/form-data">
                                <h6 class="my-3">Upload/Change Photo</h6>
                                <hr />
                                <div class="form-group my-3">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="college_id" value="<?php echo $student->college_id ?>" />
                                    <input type="file" name="student_photo" onchange="idcard_photo_upload()" class="form-control my-3" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG" required />
                                </div>
                                <!-- <button type="submit" class="btn btn-primary my-3">
                                    Upload Photo
                                </button> -->
                                <div style="clear: both"></div>
                                <hr />
                                <?php if ($student->idcard_status != null && $student->idcard_status != 0) { ?>
                                    <p style="background-color: aqua; color: blue;">ID Card has been printed before...</p>
                                <?php } ?>
                                <p style="background-color: aqua; color: blue;" id="idcard_status_update"></p>
                                <button type="button" class="btn btn-link btn-lg btn-upload border-primary" style="font-size: 40px; text-decoration: none" onclick='idcard_print("<?php echo $student->college_id; ?>")'>
                                    <span data-feather="printer"></span>
                                    Print Card
                                </button>
                            </form>








                            <div style="background-image: url(./images/kpc_front.jpg); background-size: 100% 100%; width: 1100px; height: 2000px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; visibility: hidden;" id="print_me_big">
                                <table border="0" style="background-size: 100% 100%; width: 1100px; height: 2000px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;">
                                    <tr>
                                        <td colspan="3" width="165" height="350"></td>
                                    </tr>
                                    <tr height="430">
                                        <td width="305"></td>
                                        <td width="210"><img id="student_photo_div_big" src="{{ $student->student_photo }}" height="540" width="410" style="position: relative; border-radius: 10px;" /></td>
                                        <td width="255" style="margin: 0; padding: 0;">
                                            <?php if ($student->college_name != 'Kingston Model School') { ?>
                                                <div id="rotate-text" style="z-index: 1000; transform: rotate(-90deg); font-size: 38px; font-weight: bold; float: right; position: absolute; right: -240px; text-transform: uppercase;">
                                                    <?php if (strpos($student->college_id, 'V/KPC') !== false || strpos($student->college_id, 'KTTC') !== false) { ?>
                                                        <p style="">&nbsp;Valid upto: <span style="">July, <?php echo (int)substr($student->student_session, 0, 4) + 2; ?></span></p>
                                                    <?php } elseif (strpos($student->college_id, 'KLC-BBA') !== false || strpos($student->college_id, 'KLC-BA') !== false) { ?>
                                                        <p style="">&nbsp;Valid upto: <span style="">July, <?php echo (int)substr($student->student_session, 0, 4) + 5; ?></span></p>
                                                    <?php } else { ?>
                                                        <p style="">&nbsp;Valid upto: <span style="">July, <?php echo (int)substr($student->student_session, 0, 4) + 3; ?></span></p>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="339" valign="top" align="left">
                                            <br />
                                            <span style="font-size: 52px; font-weight: bold; line-height: 1.8; text-transform: uppercase;">
                                                &nbsp;Student ID: {{$student->college_id}} <br />
                                                &nbsp;Name: {{$student->student_name}} <br />
                                                &nbsp;Session: {{$student->student_session}} <br />
                                                &nbsp;Contact: {{$student->student_mobile}} <br />
                                                &nbsp;Blood Group: {{$student->student_blood_group}} <br />
                                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

                                                @php
                                                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                @endphp
                                                <br style="height: 5px; margin: 0; padding: 0; line-height: 5px">
                                                &nbsp;<img style="padding-top: 13px; height: 120px; width: 400px;" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($student->college_id, $generatorPNG::TYPE_CODE_128)) }}" />
                                        </td>
                                    </tr>
                                </table>
                            </div>