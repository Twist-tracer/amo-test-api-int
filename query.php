<?php
$leads['request']['leads']['add']=array(
  array(
    'name'=>'Deal for buying a cow',
    //'date_create'=>1298904164, //optional
    'status_id'=>142,
    'price'=>300000,
    'responsible_user_id'=>215302,
    'tags' => 'Important, USA', #Теги
    'custom_fields'=>array(
      array(
        'id'=>427496, # id поля типа multiselect
        'values'=>array( # id значений передаются в массиве values через запятую
            1240665,
            1240664
        )
      ),
      array(
        'id'=>427497, # id поля типа radiobutton
        'values'=>array(
          array(
            'value'=>1240667
          )
        )
      ),
      array(
        'id'=>427231, # id поля типа date
        'values'=>array(
          array(
            'value'=>'14.06.2014' # в качестве разделителя используется точка
          )
        )
      ),
      array(
        #Смарт адрес
        'id'=>458615, #Уникальный индентификатор заполняемого дополнительного поля
        'values'=>array(
          array(
            'value' => 'Address line 1',
            'subtype' => 'address_line_1',
          ),
          array(
            'value' => 'Address line 2',
            'subtype' => 'address_line_2',
          ),
          array(
            'value' => 'Город',
            'subtype' => 'city',
          ),
          array(
            'value' => 'Регион',
            'subtype' => 'state',
          ),
          array(
            'value' => '203',
            'subtype' => 'zip',
          ),
          array(
            'value' => 'RU',
            'subtype' => 'country',
          )
        )
      )
    )
  ),
  array(
    'name'=>'Deal for sailing a horse',
    //'date_create'=>1298904164, //optional
    'status_id'=>7087609,
    'price'=>600200,
    'responsible_user_id'=>215309,
    'custom_fields'=>array(
      array(
        #Нестандартное дополнительное поле типа "мультисписок", которое мы создали
        'id'=>426106,
        'values'=>array(
          1237756,
          1237758
        )
      )
    )
  )
);