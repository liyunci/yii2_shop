<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/8/23
 * Time: 上午10:44
 */

namespace console\controllers;

use common\ActiveRecord\BankCodeAR;
use common\ActiveRecord\DistrictCityAR;
use common\ActiveRecord\DistrictDistrictAR;
use yii\console\Controller;

use Yii;
class ExcelController extends Controller
{

    public function actionExcel()
    {
        $diff = [
            110228,
            110229,
            120221,
            120223,
            130103,
            130124,
            130182,
            130185,
            130230,
            130323,
            130603,
            130604,
            130621,
            130622,
            130625,
            130721,
            210122,
            210282,
            220181,
            220625,
            220724,
            230182,
            231024,
            232702,
            232703,
            232704,
            310108,
            320124,
            320125,
            320202,
            320203,
            320204,
            320405,
            320482,
            320502,
            320584,
            320705,
            320721,
            320982,
            321284,
            321088,
            330183,
            330322,
            330621,
            330682,
            340502,
            340702,
            340703,
            340721,
            340823,
            341521,
            341402,
            341421,
            341422,
            341423,
            341424,
            350784,
            350822,
            360122,
            360220,
            360782,
            361122,
            370284,
            370802,
            370882,
            371081,
            371624,
            371421,
            410211,
            410224,
            411222,
            421302,
            420321,
            430101,
            430120,
            430122,
            430123,
            432324,
            432124,
            430201,
            432125,
            432126,
            432123,
            430219,
            439001,
            430220,
            430222,
            432127,
            430301,
            432100,
            430303,
            430305,
            430306,
            430311,
            430312,
            432121,
            430322,
            432122,
            430401,
            430402,
            430403,
            430404,
            432700,
            430411,
            432721,
            432722,
            432723,
            432724,
            430425,
            432725,
            432726,
            430427,
            432830,
            430501,
            432600,
            430504,
            432523,
            432525,
            432621,
            432622,
            432624,
            430526,
            432623,
            432626,
            432625,
            432627,
            432200,
            432201,
            432221,
            430601,
            430622,
            432225,
            432226,
            432223,
            432222,
            430625,
            432224,
            430701,
            432400,
            432401,
            432421,
            432423,
            432424,
            432425,
            432426,
            432427,
            432402,
            432422,
            430801,
            433128,
            433102,
            430727,
            432428,
            433129,
            430901,
            432300,
            432301,
            432321,
            432302,
            432323,
            432322,
            432325,
            432326,
            431301,
            432500,
            432501,
            432502,
            432503,
            432521,
            432522,
            432524,
            431001,
            432800,
            432801,
            432821,
            432802,
            432825,
            432822,
            432823,
            432824,
            432826,
            432827,
            432828,
            432829,
            432831,
            431101,
            432900,
            432901,
            432902,
            432921,
            432922,
            432923,
            432924,
            432925,
            432926,
            432927,
            432928,
            432929,
            432930,
            432727,
            431201,
            433000,
            433001,
            433028,
            433002,
            433021,
            433022,
            433023,
            433024,
            433025,
            433026,
            433027,
            433029,
            433030,
            433031,
            433121,
            439000,
            439002,
            439003,
            439004,
            439005,
            440116,
            440183,
            440184,
            445221,
            445121,
            440903,
            440923,
            441283,
            441421,
            441723,
            441827,
            450122,
            450322,
            450404,
            451025,
            469003,
            510122,
            500222,
            500223,
            500224,
            500225,
            500226,
            500227,
            512081,
            511422,
            511522,
            511721,
            511821,
            513229,
            513321,
            520114,
            522200,
            522201,
            522222,
            522223,
            522224,
            522225,
            522226,
            522227,
            522228,
            522229,
            522230,
            522400,
            522401,
            522422,
            522423,
            522424,
            522425,
            522426,
            522427,
            522428,
            520421,
            530121,
            530328,
            530421,
            532526,
            532621,
            530522,
            533421,
            540125,
            542336,
            542100,
            542121,
            542122,
            542123,
            542124,
            542125,
            542126,
            542127,
            542128,
            542129,
            542132,
            542133,
            542221,
            542222,
            542223,
            542224,
            542225,
            542226,
            542227,
            542228,
            542229,
            542231,
            542232,
            542233,
            542300,
            542301,
            542322,
            542323,
            542324,
            542325,
            542326,
            542327,
            542328,
            542329,
            542330,
            542331,
            542332,
            542333,
            542334,
            542335,
            542337,
            542338,
            542600,
            542621,
            542622,
            542623,
            542624,
            542625,
            542626,
            542627,
            610126,
            610521,
            610823,
            632100,
            632121,
            632122,
            632123,
            632126,
            632127,
            632128,
            632721,
            650108,
            652100,
            652101,
            652122,
            652123,
            652303,
        ];
        $fileName = '/Users/lishuang/Downloads/test.xls';
        //第一种方法
        //建立reader对象 ，分别用两个不同的类对象读取2007和2003版本的excel文件
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        if(!$PHPReader->canRead($fileName))
        {
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if( ! $PHPReader->canRead($fileName)){
                echo 'no Excel';
                return ;
            }
        }

        $PHPExcel = $PHPReader->load($fileName); //读取文件
        $currentSheet = $PHPExcel->getSheet(0); //读取第一个工作簿
        $twoSheet =  $PHPExcel->getSheet(4);//第二
        //$allRow = $currentSheet->getHighestRow(); // 所有行

        /*foreach($currentSheet->getRowIterator() as $row)  //逐行处理
        {

            foreach($row->getCellIterator() as $cell)  //逐列读取
            {
                $data = $cell->getValue(); //获取cell中数据
                echo $data;
            }
            echo '<br/>';die;
        }*/
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,'Excel2007');   //设定写入excel的类型

        $array = [];
        for ($rowIndex = 1; $rowIndex <= 3326; $rowIndex++)
        {
            try {
                $one = $currentSheet->getCell('A'.$rowIndex)->getValue();
                if(in_array($one,$diff)){
                    $two = $currentSheet->getCell('B'.$rowIndex)->getValue();
                    $three = $currentSheet->getCell('C'.$rowIndex)->getValue();
                    $four = $currentSheet->getCell('D'.$rowIndex)->getValue();
                    $five = $currentSheet->getCell('E'.$rowIndex)->getValue();
                    $six = $currentSheet->getCell('F'.$rowIndex)->getValue();
                    $seven = $currentSheet->getCell('G'.$rowIndex)->getValue();
                    $array[] =  array($one,$two,$three,$four,$five,$six,$seven);
                }else{
                    continue;
                }
            }catch (\Exception $exception){

                echo $exception->getMessage();
            }
        }
        $twoSheet->fromArray($array);  //利用fromArray()直接一次性填充数据
        $objWriter->save($fileName);       //保存文件
    }

    public function actionBank(){
        $fileName = '/Users/lishuang/Downloads/district.xlsx';
        //第一种方法
        //建立reader对象 ，分别用两个不同的类对象读取2007和2003版本的excel文件
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        if(!$PHPReader->canRead($fileName))
        {
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if( ! $PHPReader->canRead($fileName)){
                echo 'no Excel';
                return ;
            }
        }
        $PHPExcel = $PHPReader->load($fileName); //读取文件
        $currentSheet = $PHPExcel->getSheet(0); //读取第一个工作簿
        $twoSheet =  $PHPExcel->getSheet(1);//第二
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,'Excel2007');   //设定写入excel的类型

        $array = [];
        for ($rowIndex = 1; $rowIndex <= 201; $rowIndex++)
        {

            $a = $currentSheet->getCell('A'.$rowIndex)->getValue();
            $b = $currentSheet->getCell('B'.$rowIndex)->getValue();
            $g = $currentSheet->getCell('G'.$rowIndex)->getValue();

            $bankAreaCode = Yii::$app->FQ->AR(new BankCodeAR())->one([
                'select'=>'count(*) as num,area_code',
                'where'=>"bank_name like '%{$b}%'",
                'groupBy'=>'area_code',
                'orderBy'=>'area_code desc'
            ]);

            $cityAreaCode = Yii::$app->FQ->AR(new DistrictCityAR())->scalar([
                'select'=>'areacode',
                'where'=>'id = '.$g
            ]);
            if(substr($bankAreaCode['area_code'],0,2) == substr($cityAreaCode,0,2) ){
                DistrictDistrictAR::updateAll(['areacode'=>$bankAreaCode['area_code']],'id='.$a);
                continue;
            }else{
                $array[] = [
                    $a,$b,$bankAreaCode['area_code'] ? :'无'
                ];
            }
        }
        $twoSheet->fromArray($array);  //利用fromArray()直接一次性填充数据
        $objWriter->save($fileName);       //保存文件
    }
}