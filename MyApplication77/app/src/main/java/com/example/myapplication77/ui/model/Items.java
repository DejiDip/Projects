package com.example.myapplication77.ui.model;

public class Items {

    private String name, score, score2, score3, date;

    public Items() {
    }

    public Items(String name, String score, String score2, String score3,String date) {

        this.name = name;
        this.score = score;
        this.score2 = score2;
        this.score3 = score3;
        this.date = date;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getScore() {
        return score;
    }

    public void setScore(String score) {
        this.score = score;
    }
    public String getScore2() {
        return score2;
    }

    public void setScore2(String score2) {
        this.score2 = score2;
    }
    public String getScore3() {
        return score3;
    }

    public void setScore3(String score3) {
        this.score3 = score3;
    }
    public void setDate(String date) {
        this.date = date;
    }
    public String getDate() {
        return date;
    }
}