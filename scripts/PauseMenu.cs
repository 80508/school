using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;


public class PauseMenu : MonoBehaviour 
{
	public GameObject pauseMenu;
	public bool pauseCheck = false;
	public GameObject GUI;


	void Start()
	{
		pauseMenu.SetActive (false);
		GUI.SetActive (true);
		Cursor.visible = false;
		Time.timeScale = 1;
	}

	void Update ()
	{
		if (Input.GetKeyDown (KeyCode.JoystickButton7) && pauseCheck == false) 
		{
			Debug.Log ("Hij doet het");
			pauseMenu.SetActive (true);
			GUI.SetActive (false);
			Cursor.visible = true;
			Time.timeScale = 0;
		}

		if (pauseCheck == true) 
		{
			Debug.Log ("Hij doet het");
			pauseMenu.SetActive (false);
			GUI.SetActive (true);
			Cursor.visible = false;
			Time.timeScale = 1;
			pauseCheck = false;
		}
			
	}


	public void check (bool check)
	{
		if (check == true) 
		{
			pauseCheck = true;
		}
	}


	public void Changescene(string scenetochangeto)
	{
		SceneManager.LoadScene (scenetochangeto);
	}



}