# Generated by Django 4.2.1 on 2023-06-03 14:38

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('api', '0006_alter_iss_2_input_md5'),
    ]

    operations = [
        migrations.AlterField(
            model_name='iss_2_input',
            name='defense',
            field=models.CharField(max_length=7),
        ),
        migrations.AlterField(
            model_name='iss_2_input',
            name='skill',
            field=models.CharField(max_length=7),
        ),
    ]
