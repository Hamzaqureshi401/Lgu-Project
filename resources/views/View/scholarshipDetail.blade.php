@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
 <section class="section">
   <div class="row ">
          <div class="section-body">
           
              <div class="col-12">
                <div class="card">

 <div class="panel">
            <div class="panel-body container-fluid">
                <!-- <div class="col-lg-12">
                    <div class="card card-block p-25 bg-dark">
                        <div class="counter counter-lg counter-inverse">
                            <div class="counter-label text-uppercase">Total Scholarship</div>
                            <span class="counter-number">Rs54,551,612</span>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-12 bg-dark text-center" style="color:white;">
                    <h2 >Total Scholarship</h2>
                    <span>Rs54,551,612</span>
                </div>
                 <div class="col-lg-12 bg-info text-center" style="color:white;">
                    <h2 >Scholarship Analysis</h2>
                    <span>Rs54,551,612</span>
                </div>

                
                <div class="col-xs-12">
                    <div class="box-content">
                        <!-- /.box-title -->
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:98%">
                                <thead style=" background-color: cadetblue;">
                                    <tr>
                                                <td style="color: white">Defence Base</td>
                                                <td style="color: white">Employee Ward</td>
                                                <td style="color: white">Garrisonion Base</td>
                                                <td style="color: white">kinship</td>
                                                <td style="color: white">Kinship Base</td>
                                                <td style="color: white">KinShip ScholarShip</td>
                                                <td style="color: white">Merit Base</td>
                                                <td style="color: white">N/E</td>
                                                <td style="color: white">Need Base</td>
                                                <td style="color: white">Sport Base</td>
                                                <td style="color: white">Sports Base</td>
                                                <td style="color: white">Sports Base FULL</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                                <td>Rs753,883 </td>
                                                <td>Rs2,260,136 </td>
                                                <td>Rs194,400 </td>
                                                <td>Rs60,960 </td>
                                                <td>Rs3,014,573 </td>
                                                <td>Rs2,063,109 </td>
                                                <td>Rs20,016,325 </td>
                                                <td>Rs0 </td>
                                                <td>Rs9,235,848 </td>
                                                <td>Rs329,130 </td>
                                                <td>Rs16,501,030 </td>
                                                <td>Rs122,220 </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered">
                                <tbody><tr style="background-color: cadetblue">
                                    <td class="heading"></td>
                                    <td class="heading" style="color: white;font-weight: bold; font-size: 19px; text-align: center;" colspan="6">Defence</td>
                                    <td class="heading" colspan="3" style="font-weight: bold; font-size: 19px; color: white; text-align: center;">Civilian</td>
                                    <td class="heading" colspan="2" style="font-weight: bold; font-size: 19px; color: white; text-align: center;">Shaheed</td>
                                    <td class="heading" style="font-weight: bold; font-size: 19px; color: white; text-align: center;" colspan="6">Sports</td>
                                </tr>
                                <tr>
                                    <td class="heading">Category</td>
                                    <td style=" color: white; background-color: black;">Count</td>
                                    <td style=" color: white; background-color: black;">Actual GP</td>
                                    <td style=" color: white; background-color: black;">Full GP</td>
                                    <td style=" color: white; background-color: black;">GP Difference</td>
                                    <td style=" color: white; background-color: black;">Other Rebate</td>
                                    <td style=" color: white; background-color: black;">Total Rebate</td>
                                    <td style=" color: white; background-color: black;">Count</td>
                                    <td style=" color: white; background-color: black;">Actual GP</td>
                                    <td style=" color: white; background-color: black;">Rebate</td>
                                    <td style=" color: white; background-color: black;">Count</td>
                                    <td style=" color: white; background-color: black;">Full GP</td>

                                    <td style=" color: white; background-color: black;">Count</td>
                                    <td style=" color: white; background-color: black;">Actual GP</td>
                                    <td style=" color: white; background-color: black;">Full GP</td>
                                    <td style=" color: white; background-color: black;">GP Difference</td>
                                    <td style=" color: white; background-color: black;">Other Rebate</td>
                                    <td style=" color: white; background-color: black;">Total Rebate</td>
                                </tr>
                            <tr>
                                <td class="heading">Defence Base</td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="civilian">70 </td>
                                <td class="civilian">Rs8,904,025 </td>
                                <td class="civilian">Rs753,883 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                            </tr>
                            <tr>
                                <td class="heading">Employee Ward</td>
                                <td class="army">15 </td>
                                <td class="army">Rs1,051,160 </td>
                                <td class="army">Rs1,466,260 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs415,100 </td>
                                <td class="army">Rs859,001 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs1,274,101 </td>
                                <td class="civilian">20 </td>
                                <td class="civilian">Rs1,779,840 </td>
                                <td class="civilian">Rs1,401,135 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                            </tr>
                            <tr>
                                <td class="heading">Garrisonion Base</td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="civilian">11 </td>
                                <td class="civilian">Rs1,271,760 </td>
                                <td class="civilian">Rs194,400 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                            </tr>
                            <tr>
                                <td class="heading">Kinship</td>
                                <td class="army">1 </td>
                                <td class="army">Rs72,560 </td>
                                <td class="army">Rs99,760 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs27,200 </td>
                                <td class="army">Rs16,575 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs43,775 </td>
                                <td class="civilian">2 </td>
                                <td class="civilian">Rs191,560 </td>
                                <td class="civilian">Rs44,385 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                            </tr>
                            <tr>
                                <td class="heading">Kinship Base</td>
                                <td class="army">86 </td>
                                <td class="army">Rs6,118,040 </td>
                                <td class="army">Rs8,523,760 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs2,405,720 </td>
                                <td class="army">Rs1,395,230 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs3,800,950 </td>
                                <td class="civilian">67 </td>
                                <td class="civilian">Rs6,886,470 </td>
                                <td class="civilian">Rs1,594,593 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed">1 </td>
                                <td class="shaheed">Rs104,260 </td>
                                <td class="shaheed">Rs104,260 </td>
                                <td class="shaheed">Rs0 </td>
                                <td class="shaheed">Rs24,750 </td>
                                <td class="shaheed">Rs24,750 </td>
                            </tr>
                            <tr>
                                <td class="heading">KinShip ScholarShip</td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="civilian">77 </td>
                                <td class="civilian">Rs9,828,155 </td>
                                <td class="civilian">Rs2,063,109 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                            </tr>
                            <tr>
                                <td class="heading">Merit Base</td>
                                <td class="army">35 </td>
                                <td class="army">Rs2,555,580 </td>
                                <td class="army">Rs3,560,260 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs1,004,680 </td>
                                <td class="army">Rs1,646,420 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs2,651,100 </td>
                                <td class="civilian">237 </td>
                                <td class="civilian">Rs27,818,335 </td>
                                <td class="civilian">Rs18,369,905 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                            </tr>
                            <tr>
                                <td class="heading">N/E</td>
                                <td class="army">1329 </td>
                                <td class="army">Rs88,160,590 </td>
                                <td class="army">Rs122,672,240 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs34,511,650 </td>
                                <td class="army">Rs0 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs34,511,650 </td>
                                <td class="civilian">3411 </td>
                                <td class="civilian">Rs336,955,590 </td>
                                <td class="civilian">Rs0 </td>
                                <td class="shaheed">58 </td>
                                <td class="shaheed">Rs5,840,970 </td>
                                <td class="shaheed">19 </td>
                                <td class="shaheed">Rs1,812,620 </td>
                                <td class="shaheed">Rs2,023,920 </td>
                                <td class="shaheed">Rs211,300 </td>
                                <td class="shaheed">Rs0 </td>
                                <td class="shaheed">Rs211,300 </td>
                            </tr>
                            <tr>
                                <td class="heading">Need Base</td>
                                <td class="army">135 </td>
                                <td class="army">Rs9,675,860 </td>
                                <td class="army">Rs13,449,620 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs3,773,760 </td>
                                <td class="army">Rs1,724,985 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs5,498,745 </td>
                                <td class="civilian">383 </td>
                                <td class="civilian">Rs41,531,835 </td>
                                <td class="civilian">Rs7,483,435 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed">1 </td>
                                <td class="shaheed">Rs117,570 </td>
                                <td class="shaheed">Rs135,070 </td>
                                <td class="shaheed">Rs17,500 </td>
                                <td class="shaheed">Rs27,428 </td>
                                <td class="shaheed">Rs44,928 </td>
                            </tr>
                            <tr>
                                <td class="heading">Sport Base</td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="civilian"> </td>
                                <td class="civilian"> </td>
                                <td class="civilian"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed">3 </td>
                                <td class="shaheed">Rs400,210 </td>
                                <td class="shaheed">Rs400,210 </td>
                                <td class="shaheed">Rs0 </td>
                                <td class="shaheed">Rs329,130 </td>
                                <td class="shaheed">Rs329,130 </td>
                            </tr>
                            <tr>
                                <td class="heading">Sports Base</td>
                                <td class="army">11 </td>
                                <td class="army">Rs755,580 </td>
                                <td class="army">Rs1,040,980 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs285,400 </td>
                                <td class="army">Rs664,700 </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;">Rs950,100 </td>
                                <td class="civilian">86 </td>
                                <td class="civilian">Rs8,312,840 </td>
                                <td class="civilian">Rs7,576,355 </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed">90 </td>
                                <td class="shaheed">Rs9,117,135 </td>
                                <td class="shaheed">Rs9,249,135 </td>
                                <td class="shaheed">Rs132,000 </td>
                                <td class="shaheed">Rs8,259,975 </td>
                                <td class="shaheed">Rs8,391,975 </td>
                            </tr>
                            <tr>
                                <td class="heading">Sports Base FULL</td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="army"> </td>
                                <td class="army" style="box-shadow: 94px 177px; border: 1px solid black;"> </td>
                                <td class="civilian"> </td>
                                <td class="civilian"> </td>
                                <td class="civilian"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed"> </td>
                                <td class="shaheed">1 </td>
                                <td class="shaheed">Rs122,220 </td>
                                <td class="shaheed">Rs122,220 </td>
                                <td class="shaheed">Rs0 </td>
                                <td class="shaheed">Rs122,220 </td>
                                <td class="shaheed">Rs122,220 </td>
                            </tr>
                            </tbody></table>
                        </div>

                    </div>
                    <!-- /.box-content   darkblue -->
                </div>

            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
@endsection




      