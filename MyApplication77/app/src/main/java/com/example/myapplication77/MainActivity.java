package com.example.myapplication77;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.example.myapplication77.ui.adapter.CustomListAdapter;
import com.example.myapplication77.ui.model.Items;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    private List<Items> itemsList = new ArrayList<>();
    private ListView listView;
    private CustomListAdapter adapter;
    private Button addButton;
    private Button newGameButton;
    private Button homeButton;
    private Button refButton;
    private TextView totalView;  // TextView to display total score
    private TextView resultView;
    private TextView badView;
    private Button clearButton;  // Reference to the clear button

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        listView = findViewById(R.id.list);
        adapter = new CustomListAdapter(this, itemsList);
        listView.setAdapter(adapter);
        // Initialize the buttons
        addButton = findViewById(R.id.addButton);
        homeButton = findViewById(R.id.homeButton);
        refButton = findViewById(R.id.refButton);
        resultView = findViewById(R.id.resultView);
        badView = findViewById(R.id.badView);
        // Initialize TextView
        totalView = findViewById(R.id.totalView);

        clearButton = findViewById(R.id.clearButton);

        addButton.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, NewEntryActivity.class)));
        homeButton.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, NewGameActivity.class)));
        refButton.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, MainActivity.class)));

        // Set a click listener for the clear button
        clearButton.setOnClickListener(view -> clearDatabase());

        // Set a click listener for the new game button
        refButton.setOnClickListener(view -> calculateTotalScore());

        initializeDatabase();
        calculateTotalScore();
        calculateLowestScore();
        calculateAndDisplayPlayerScores();

        listView.setOnItemClickListener((parent, view, position, id) -> {
            // Get the selected game item
            Items selectedGame = itemsList.get(position);

            // Create an Intent to open GameDetailsActivity
            Intent intent = new Intent(MainActivity.this, GameDetailsActivity.class);

            // Pass the selected game details to GameDetailsActivity
            intent.putExtra("name", selectedGame.getName());
            intent.putExtra("score", selectedGame.getScore());
            intent.putExtra("score2", selectedGame.getScore2());
            intent.putExtra("score3", selectedGame.getScore3());
            intent.putExtra("date", selectedGame.getDate());

            // Start GameDetailsActivity
            startActivity(intent);
        });
    }

    private void initializeDatabase() {
        SQLiteDatabase myDB = null;

        try {
            // Create a Database if it doesn't exist, otherwise Open It
            myDB = this.openOrCreateDatabase("leaderboard", MODE_PRIVATE, null);

            // Create table in the database if it doesn't exist already
            myDB.execSQL("CREATE TABLE IF NOT EXISTS scores (name TEXT, score TEXT, score2 TEXT, score3 TEXT);");

            // Select all rows from the table
            Cursor cursor = myDB.rawQuery("SELECT * FROM scores", null);

            // If there are no rows (data), then insert some into the table
            if (cursor != null && cursor.getCount() == 0) {
                myDB.execSQL("INSERT INTO scores (name, score, score2, score3, date) VALUES ('Andy', '7', '8', '3', '2023');");
                myDB.execSQL("INSERT INTO scores (name, score, score2, score3, date) VALUES ('Marie', '4', '3', '5', '2023');");
                myDB.execSQL("INSERT INTO scores (name, score, score2, score3, date) VALUES ('George', '1', '4', '6', '2023');");
            }

            // Read all rows from the database and add to the Items array
            if (cursor.moveToFirst()) {
                do {
                    Items items = new Items();
                    items.setName(cursor.getString(0));
                    items.setScore(cursor.getString(1));
                    items.setScore2(cursor.getString(2));
                    items.setScore3(cursor.getString(3));
                    items.setDate(cursor.getString(4));
                    itemsList.add(items);
                } while (cursor.moveToNext());
            }

            // Notify the adapter to populate the list using the Items Array
            adapter.notifyDataSetChanged();

        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            // Close the cursor and database after using them
            if (myDB != null) {
                myDB.close();
            }
        }
    }

    // New method to clear the database
    private void clearDatabase() {
        SQLiteDatabase myDB = null;

        try {
            myDB = this.openOrCreateDatabase("leaderboard", MODE_PRIVATE, null);
            myDB.execSQL("DROP TABLE IF EXISTS scores");  // Drop the table to clear the database
            myDB.execSQL("CREATE TABLE IF NOT EXISTS scores (name TEXT, score TEXT, score2 TEXT, score3 TEXT, date TEXT);");  // Recreate the table
            itemsList.clear();  // Clear the items list
            adapter.notifyDataSetChanged();  // Notify the adapter

        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (myDB != null) {
                myDB.close();
            }
        }
    }

    // method to calculate and display individual player scores
    private void calculateAndDisplayPlayerScores() {
        StringBuilder playerScores = new StringBuilder();

        // map to store scores by year
        Map<Integer, Integer> dateTotalScores = new HashMap<>();

        for (Items item : itemsList) {
            int playerScore = Integer.parseInt(item.getScore())
                    + Integer.parseInt(item.getScore2())
                    + Integer.parseInt(item.getScore3());

            // Add the player's score to the total score for their year
            int totalScoreForYear = dateTotalScores.getOrDefault(item.getDate(), 0);
            totalScoreForYear += playerScore;
            dateTotalScores.put(Integer.valueOf(item.getDate()), totalScoreForYear);

            playerScores.append(item.getName())
                    .append(": ")
                    .append(playerScore)
                    .append("\n");
        }

        // Display scores by year
        for (Map.Entry<Integer, Integer> entry : dateTotalScores.entrySet()) {
            playerScores.append("Year ")
                    .append(entry.getKey())
                    .append("\n");
        }

        int lowestScore = calculateLowestScore();

        playerScores.append("Lowest Score: ").append(lowestScore);

        resultView.setText(playerScores.toString());
        badView.setText("Worst Score: " + lowestScore);
    }
    // Calculate and display the total score
    private void calculateTotalScore() {
        int totalScore = 0;

        for (Items item : itemsList) {
            totalScore += Integer.parseInt(item.getScore());
            totalScore += Integer.parseInt(item.getScore2());
            totalScore += Integer.parseInt(item.getScore3());

        }

        totalView.setText("Total Score: " + totalScore);

    }
    private int calculateLowestScore() {
        int lowestScore = Integer.MAX_VALUE;

        for (Items item : itemsList) {
            int playerScore = Integer.parseInt(item.getScore())
                    + Integer.parseInt(item.getScore2())
                    + Integer.parseInt(item.getScore3());

            lowestScore = Math.min(lowestScore, playerScore);
        }

        return lowestScore;
    }
}
