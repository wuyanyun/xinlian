<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'username',
            [
                'label'=>'性别',
                'attribute' => 'sex',
                'value'=>function($model){
                    return yii::$app->params['SEX'][$model->sex];
                },
                'filter' => yii::$app->params['SEX'],
            ],
//            'sex',
            'email:email',
            'id_card',
            [
                'label'=>'科室',
                'attribute'=>'dep_name',
                'value'=>function($model){
                     return isset($model->department->dep_name)?$model->department->dep_name:"";
                },
            ],
               [
                'label'=>'审核状态',
                'attribute'=>'status',
                'value'=>function($model){
                     return yii::$app->params['DOCTOR_STATUS'][$model->status];
                },
                'filter' => yii::$app->params['DOCTOR_STATUS'],
            ],
            [
                'label'=>'是否展示',
                'attribute'=>'show_index',
                 'value'=>function($model){
                     return yii::$app->params['show_index'][$model->show_index];
                },
                'filter' => yii::$app->params['show_index'],
            ],
//             'department_id',
            // 'skill_disease',
            // 'id_card_front',
            // 'id_card_back',
            // 'doc_certification',
            // 'practicing_certificate',
            // 'highest_professional',
            // 'add_time:datetime',
            // 'verify_time:datetime',
            // 'mobile',
            // 'age',
            // 'province_id',
            // 'city_id',
            // 'area_id',
            // 'address',
            // 'practice_experience',
            // 'academic_post',

                ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
               'template' => ' {handle}{view}{edit} {delete} ',
                'buttons' => [
                     'handle' => function ($url, $model, $key) {
                        return Html::a('处理', ['handle','id'=>$key], [
                        'class' => 'btn btn-success btn-info btn-xs handle',
                        'data-toggle' => 'modal', // 固定写法
                        'data-target' => '#operate-modal', // 等于4.1begin中设定的参数id值
                        ]
                        );
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('预览', ['view', 'id' => $key], ['class' => 'btn btn-info btn-xs', ]
                        );
                    },
                   
                    'edit' => function ($url, $model, $key) {
                        return Html::a('编辑', ['update', 'id' => $key], ['class' => 'btn btn-info btn-xs',]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('删除', ['delete', 'id' => $key],  [
                                    'class' => 'btn btn-info btn-xs',
                                   
                                    'data' => ['confirm' => '删除医生记录,是否继续操作？','method'=>'post']
                                ]);
                    },
                ],

                ],
        ],
         'pager' => [
            'firstPageLabel' => "首页",
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '最后一页',
        ],
    ]); ?>
</div>
<?php
use yii\bootstrap\Modal;
Modal::begin([
    'id' => 'operate-modal',
    'header' => '<h4 class="modal-title"></h4>',
]); 
Modal::end();
use yii\helpers\Url;
// 创建
$requestUpdateUrl = Url::toRoute('handle');
$js = <<<JS
// 创建操作
$('.handle').on('click', function () {
    $('.modal-title').html('操作');
    $.get('{$requestUpdateUrl}', { id: $(this).closest('tr').data('key') },
        function (data) {
            $('.modal-body').html(data);
        }  
    );
});
JS;
$this->registerJs($js);
?>