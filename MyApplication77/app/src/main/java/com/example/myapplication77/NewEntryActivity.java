package com.example.myapplication77;

// NewEntryActivity.java

import android.content.ContentValues;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;
public class NewEntryActivity extends AppCompatActivity {

    private EditText editTextName;
    private EditText editTextScore;
    private EditText editTextScore2;
    private EditText editTextScore3;
    private EditText editTextDate;
    private Button buttonSave;
    private Button playButton;


    private SQLiteDatabase myDB;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_new_entry);

        myDB = openOrCreateDatabase("leaderboard", MODE_PRIVATE, null);

        editTextName = findViewById(R.id.editTextName);
        editTextScore = findViewById(R.id.editTextScore);
        editTextScore2 = findViewById(R.id.editTextScore2);
        editTextScore3 = findViewById(R.id.editTextScore3);
        editTextDate = findViewById(R.id.editTextDate);

        buttonSave = findViewById(R.id.buttonSave);
        playButton = findViewById(R.id.playButton);
        playButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Call saveEntry() when playButton is clicked
                move();
                saveEntry();
            }
        });

        buttonSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                saveEntry();
            }});
    }
    private void move() {
        // Your code here
        startActivity(new Intent(NewEntryActivity.this, NewEntryActivity.class));
    }

    private void saveEntry() {
        String name = editTextName.getText().toString().trim();
        String score = editTextScore.getText().toString().trim();
        String score2 = editTextScore2.getText().toString().trim();
        String score3 = editTextScore3.getText().toString().trim();
        String date = editTextDate.getText().toString().trim();

        if (isValidInput(name, score, score2, score3, date)) {
            ContentValues values = new ContentValues();
            values.put("name", name);
            values.put("score", score);
            values.put("score2", score2);
            values.put("score3", score3);
            values.put("date", date);

            // Insert the new entry into the 'scores' table using dynamic values
            myDB.insert("scores", null, values);

            // Close the database
            myDB.close();

            // Finish the activity
            finish();
        } else {
        }
    }

    private boolean isValidInput(String name, String score, String score2, String score3, String date) {
        return !TextUtils.isEmpty(name) && !TextUtils.isEmpty(score) && !TextUtils.isEmpty(score2) && !TextUtils.isEmpty(score3) && !TextUtils.isEmpty(date);
    }
}