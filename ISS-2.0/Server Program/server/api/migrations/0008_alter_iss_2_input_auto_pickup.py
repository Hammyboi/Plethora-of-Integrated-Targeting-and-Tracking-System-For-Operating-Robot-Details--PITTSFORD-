# Generated by Django 4.2.1 on 2023-06-04 14:15

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('api', '0001_squashed_0007_alter_iss_2_input_defense_alter_iss_2_input_skill'),
    ]

    operations = [
        migrations.AlterField(
            model_name='iss_2_input',
            name='auto_pickup',
            field=models.BooleanField(),
        ),
    ]